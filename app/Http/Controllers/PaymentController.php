<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsorship;
use App\Apartment;
use Carbon\Carbon;
//require 'vendor/autoload.php';

class PaymentController extends Controller
{

    public function promoForm($id){
        $apts = Apartment::all();
        $apt = Apartment::findOrFail($id);
        $promo = Sponsorship::all();
        return view('sponsorship', compact('promo', 'apt','apts'));
    }

    public function promoPayment(Request $request, $id){ //id del Flat
        $data = $request -> all();
        $data = $request -> validate([
            'promo' => ['required']
            ]);
        $promo_array = explode('/', $data['promo']);
        $promoId = $promo_array[0];
        $promoDur = $promo_array[1];
        $promo = Sponsorship::findOrFail($promoId);
        $apt = Apartment::findOrFail($id);
        $date = Carbon::now();
        $carbon_date = Carbon::parse($date);
        $carbon_date->addHours($promoDur);
        $var1= Carbon::parse($carbon_date);
        // if ($var1 > $date){
        //   dd('OK');
        // }
        // prende la riga del DB di "Sponsor" e la associa alla riga del DB di Flat
        $promo-> apts() -> attach($apt, ['date_end'=> $carbon_date]);
        return redirect() -> route('profile') -> with('status', 'Pagamento approvato!!!');
    }
    public function promoFormUpdate($id){
        $apts = Apartment::all();
        $apt = Apartment::findOrFail($id);
        $promo = Sponsorship::all();
        return view('sponsor_form_update', compact('promo', 'apt','apts'));
    }
    public function promoPaymentUpdate(Request $request, $id){ //id del Apt
        $data = $request -> all();
        $data = $request -> validate([
            'promo' => ['required']
            ]);
        $promo_array = explode('/', $data['promo']);
        $promoId = $promo_array[0];
        $promoDur = $promo_array[1];
        $promo = Sponsorship::findOrFail($promoId);
        $apt = Apartment::findOrFail($id);
        $date = Carbon::now();
        $carbon_date = Carbon::parse($date);
        $carbon_date->addHours($promoDur);
        $var1= Carbon::parse($carbon_date);
        // if ($var1 > $date){
        //   dd('OK');
        // }
        $apt_promoID = $apt-> Sponsorship-> first()-> pivot-> id;
        $spoID = $apt-> Sponsorship-> first()-> pivot-> promo_id;
        // prende la riga del DB di "Sponsor" e la associa alla riga del DB di Flat
        $apt-> promo()->wherePivot('id',$apt_promoID)->updateExistingPivot($spoID, ['sponsor_id' => $promoId,'date_end' => $carbon_date]);
        return redirect() -> route('profile') -> with('status', 'Pagamento approvato!!!');
    }
}
