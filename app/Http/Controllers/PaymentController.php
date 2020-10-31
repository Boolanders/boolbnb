<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsorship;
use App\Apartment;
use Carbon\Carbon;
use Braintree\Gateway;
use App\Promotion;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function sponsorshipPayment(Request $request, $id){ //id del Flat
    
        $gateway = new Gateway([
        'environment' => env('BRAINTREE_ENV'),
        'merchantId' => env('BRAINTREE_MERCHANT_ID'),
        'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
        'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $promoId = $request['promo_id'];

        $promo = Promotion::where('id', '=', $promoId) -> first();

        $price = $promo['price'];

        $hours = $promo['hours'];

        // Metodo di pagamento
        $nonce = $request->payment_method_nonce;


        // Passare tutti i dati relativi al pagamento
        $result = $gateway->transaction()->sale([
            'amount' => $price,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        // Se la transazione ha avuto successo
        if ($result->success || !is_null($result->transaction)) {
            
            $endDate = Carbon::parse($request['start_date']) -> addHours($hours);

            $startDate = $request['start_date'] ;

            Sponsorship::create([
                'start_date' => $startDate,
                'end_date' => $endDate,
                'apartment_id' => $id,
                'promotion_id' => $promoId
            ]);


            $usrId = Auth::user() -> id;

            return redirect() -> route('profile', $usrId)-> with('status', 'Sponsorship created successfully');

      
        }else {
            $errors = "";

            foreach($result->errors->deepAll() as $error) {
                $errors .= 'Error: ' . $error->code . ": " . $error->message . "<br>";
            }

            return back()-> with('error', $errors);
        }
    }
}
