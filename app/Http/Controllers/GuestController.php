<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsorship;

class GuestController extends Controller
{
   public function index(){
    $date = date('y-m-d');
    $apts = Sponsorship::where('end_date', '>', $date)-> groupBy('apartment_id') -> select('apartment_id', 'apartments.*') -> join('apartments', 'apartments.id', '=', 'sponsorships.apartment_id') -> get();

       return view('home', compact('apts'));
   }


}
