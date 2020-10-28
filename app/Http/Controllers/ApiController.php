<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsorship;
use App\Image;
use App\Visit;
use App\Message;

class ApiController extends Controller
{

    // public function search() {

    //     $data = Apartment::all();

    //     return response() -> json($data);
    // }
    public function search(request $request){

        $data = $request -> all();

        $lat = $data['lat'];
        $lon = $data['lon'];
        $dist = $data['dist'];
        $rooms = $data['rooms'];
        $beds = $data['beds'];
        $srvs = $data['srvs'];

        if($srvs != null){
            $arraySrvs = explode(',', $srvs);
        } else {
            $arraySrvs = [];
        }


        $apts = Apartment::where('visible', '=', '1') -> get();

        foreach ($apts as $apt) {
            
            $distance = distance($apt['latitude'], $apt['longitude'], $lat, $lon);

            $apt['distance'] = $distance;

            $services = Apartment::findOrFail($apt['id']) -> services() -> get();

            $aptSrvs = [];
            $srvsIcons = [];

            foreach ($services as $service) {

                $aptSrvs[] = $service['id'];
                $srvsIcons[] = $service['icon'];
            }

            $containsAllValues = !array_diff($arraySrvs, $aptSrvs);

            $apt['hasAllServices'] = $containsAllValues;

            $apt['srvsIcons'] = $srvsIcons;

            $endSponsorship = Sponsorship::where('apartment_id', '=', $apt['id']) -> max('end_date');

            if ($endSponsorship > date('Y-m-d')) {

                $apt['sponsorship'] = [true, $endSponsorship];

            } else {

                $apt['sponsorship'] = [false, $endSponsorship];
            }

            $img = Image::where('apartment_id', '=', $apt -> id) -> first();

            if($img){

                $apt['img'] = $img['img'];
            } else{

                $apt['img'] = "/img/image-not-found.png";
            }

        }

        $response = $apts -> where('distance', '<', $dist)
                            -> where('bed_qt', '>=', $beds)
                            -> where('room_qt', '>=', $rooms)
                            -> where('hasAllServices', '=', true);

        $response = $response -> sortBy('distance');

        return response() -> json($response);
    }

    public function setVisibility(request $request){

        $data = $request -> all();

        $aptId = $data['aptId'];
        $usrId = $data['usrId'];
        $visible = ['visible' => $data['visible']];

        $apt = Apartment::findOrFail($aptId);

        if($apt -> user_id = $usrId){
            $apt -> update($visible);
        }

        return json_encode(['success' => 'success']);
    }


    public function getStats(request $request){

        $aptId = $request['id'];

        $response = [];

        for ($i=1; $i < 13; $i++) { 

            $msgs = Message::where('apartment_id', '=', $aptId);

            $visits = Visit::where('apartment_id', '=', $aptId);
            
            $response['msg'][] = $msgs -> whereMonth('created_at', $i) -> whereYear('created_at', 2020) -> count();

            $response['vis'][] = $visits -> whereMonth('created_at', $i) -> whereYear('created_at', 2020) -> count();
        }

    
        return response() -> json($response);
    }
};



function distance($lat1, $lon1, $lat2, $lon2) { 
    $pi80 = M_PI / 180; 
    $lat1 *= $pi80; 
    $lon1 *= $pi80; 
    $lat2 *= $pi80; 
    $lon2 *= $pi80; 
    $r = 6372.797; // mean radius of Earth in km 
    $dlat = $lat2 - $lat1; 
    $dlon = $lon2 - $lon1; 
    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2); 
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a)); 
    $km = $r * $c; 
    //echo ' '.$km; 
    return $km; 
};