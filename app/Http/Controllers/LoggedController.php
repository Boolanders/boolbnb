<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use App\Image;
use App\Message;
use App\Promotion;
use App\Sponsorship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class LoggedController extends Controller {

    public function __construct(){
    
        $this->middleware('auth');
    
    }

    public function create() {

        $srvs = Service::all();

        return view ('create', compact('srvs'));
    }


    public function store(request $request){ 

        $data = $request -> validate([
            'description'  => 'required|min:3|max:1000',                 
            'title'  => 'required|min:3|max:60',                 
            'address'  => 'required|min:3|max:230',                 
            'room_qt'  => 'required|numeric|min:1|max:20',                 
            'bathroom_qt'  => 'required|numeric|min:1|max:8',                 
            'bed_qt'  => 'required|numeric|min:1|max:50',                   
            'mq'  => 'required|numeric|min:15|max:5000',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'img' => 'max:5',
            'img.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'services' => 'max:5',
            'services.*' => 'numeric'              
        ],[
            'img.max' => "Can't upload more than :max images",
            'img.*.max' => "Images can't be more than 2MB",
            'img.*.mimes' => 'Only images files are allowed'
        ]);  

        $id = Auth::user() -> id;

        $data['user_id'] = $id;

        $newApt = Apartment::create($data);

        if(array_key_exists('services', $data)){
            
            $newApt -> services() -> attach($data['services']);

        }

       

        if($request -> hasFile('img')){

            $imgs = $data['img'];


            foreach ($imgs as $img) {

                $name = $img -> getClientOriginalName();
        
                $url = $img -> storeAs('images' . $newApt -> id, $name, 'public');
 
                $file = Image::create([
                     'img' => '/storage/' . $url,
                     'apartment_id' => $newApt -> id
                 ]);

            }
            
        }
        
        
        return redirect() -> route('profile', $id);
    }



    public function edit($id) {

        $apt = Apartment::findOrFail($id);

        $services = $apt -> services() -> get();

        $aptSrvs = [];

        foreach ($services as $service) {

            $aptSrvs[] = $service['id'];
        }

        $srvs = Service::all();

        $imgs = Image::where('apartment_id', '=', $id) -> get();

        return view('edit', compact('apt', 'aptSrvs', 'srvs', 'imgs'));
    }




    public function update(request $request, $id){

        $data = $request -> validate([
            'description'  => 'required|min:3|max:1000',                 
            'title'  => 'required|min:3|max:60',                 
            'address'  => 'required|min:3|max:230',                 
            'room_qt'  => 'required|numeric|min:1|max:20',                 
            'bathroom_qt'  => 'required|numeric|min:1|max:8',                 
            'bed_qt'  => 'required|numeric|min:1|max:50',                   
            'mq'  => 'required|numeric|min:15|max:5000',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'img' => 'max:5',
            'img.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'services' => 'max:5',
            'services.*' => 'numeric' ,
            'imgDel',
            'imgDel.*' => 'numeric'            
        ],[
            'img.max' => "Can't upload more than :max images",
            'img.*.max' => "Images can't be more than 2MB",
            'img.*.mimes' => 'Only images files are allowed'
        ]);

        $apt = Apartment::findOrFail($id);

        if(array_key_exists('services', $data)){
            
            $apt -> services() -> sync($data['services']);

        } else {

            $apt -> services() ->detach();
        }
        $usrid = Auth::user() -> id;

        $apt-> update($data);

        if($request -> hasFile('img')){

            $imgs = $data['img'];


            foreach ($imgs as $img) {

                $name = $img -> getClientOriginalName();
        
                $url = $img -> storeAs('images' . $apt -> id, $name, 'public');
 
                $file = Image::create([
                     'img' => '/storage/' . $url,
                     'apartment_id' => $apt -> id
                 ]);

            }    
        }

        if(array_key_exists('imgDel', $data)){

            foreach ($data['imgDel'] as $id) {

                $img = Image::findOrFail($id);

                unlink(public_path($img -> img));

                $img -> delete();
            }
        }
        return redirect() -> route('profile', $usrid);
    }



    public function delete($id) {

        $apt= Apartment::findOrFail($id);
        $usrid = Auth::user() -> id;
        $apt-> delete();
        return redirect() -> route('profile', $usrid);
    }




    public function profile($id) {

        $apts= Apartment::where('user_id', '=', $id ) -> get();
        return view('profile', compact('apts'));
    }



    public function messages($id) {

        $apts= Apartment::where('user_id', '=', $id ) -> get();
        return view('messages', compact('apts'));
    }



    public function promotion($id) {

        $promos = Promotion::all();

        return view ('sponsorship', compact('promos'));
    }



    public function sponsorship(request $request, $id){

        $data = $request -> all();

        $sponsorship = Sponsorship::where(
            'promotion_id', '=', 
            'apartment_id', '=', 
            'start_date', '=', 
            'end_date', '=', 

        );
    
        return redirect() -> route('profile', $id);
    
    }

    public function stats() {

        return view('stats');
    }
}
