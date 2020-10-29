<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsorship;
use App\Apartment;
use Carbon\Carbon;
use Braintree\Gateway;
use App\Promotion;

class PaymentController extends Controller
{

    public function promoPayment(Request $request, $id){ //id del Flat
    
        $gateway = new Gateway([
        'environment' => env('BRAINTREE_ENV'),
        'merchantId' => env('BRAINTREE_MERCHANT_ID'),
        'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
        'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $promoId = $request['promo-id'];

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
            
            $startDate = Carbon::now();

            $endDate = Carbon::now() -> addHours($hours);

            Sponsorship::create([
                'start_date' => $startDate,
                'end_date' => $endDate,
                'apartment_id' => $id,
                'promotion_id' => $promoId
            ]);

            return redirect() -> route('home');

      
        }else {
            $errorString = "";

            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return response() -> json($errorString);
        }
    }
}
