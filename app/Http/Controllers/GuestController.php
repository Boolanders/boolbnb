<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsorship;
use App\Apartment;
use App\Image;
use App\Service;
use App\Message;
use App\Visit;


class GuestController extends Controller
{

   public function index(){

      $date = date('Y-m-d');

      $apts = Sponsorship::where('end_date', '>', $date) // seleziono solo le sponsorship con date maggiore di now()
                              -> join('apartments', 'apartments.id', '=', 'sponsorships.apartment_id') // join con tabella apartment
                              -> groupBy('apartment_id') // siccome ogni singolo apartment può avere n sponsorizzazioni non ancora scadute raggruppo per id apartment in modo da non aver doppioni
                              -> select('apartments.*') // prendo tutti i dati dell'appartamento
                              -> get();
         
      foreach ($apts as $apt) { // ciclo sulla lista di appartamenti con promozione non scaduta
         
         $id = $apt -> id; // Ricavo l'id dell'appartamento

         $img = Image::where('apartment_id', '=', $id) -> first(); // prendo dalla tabella immagini la prima immagine con id corrsipondente. ATTENZIONE: Potrebbero anche non esserci immagini associate all'appartamento


         if ($img){ // se esiste almeno un immagine associata all'appartamento

            $apt['img'] = $img -> img; // creo un attributo 'img' nel singolo appartamento e lo valorizzo con l'url dell'immagine ($img contiene anche altri dati tipo id ecc. io prendo solo img che è l'url dell'immagine)

         } else {
            $apt['img'] = '/img/image-not-found.png';
         }
      }

      // apts conterrà una lista di appartamenti con promozione non ancora scaduta e l'url di un immagine nell attributo img
      return view('home', compact('apts'));
   }

   public function show($id) {

      Visit::create([
         'apartment_id' => $id
      ]);

      $apt = Apartment::findOrFail($id);
      
      return view ('show', compact('apt'));
   }

 
  public function storemsg(request $request, $id){

      $data = $request -> all();
      $data['apartment_id'] = $id;

      $mail = Message::create($data);
  
      return redirect() -> route('home');
  
  }

  public function toSearch(request $request) {

   $srvs = Service::all();

   $data = $request -> all();

   return view('search', compact('srvs', 'data'));
  }


}
