<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use App\Image;
use App\Message;
use Illuminate\Support\Facades\Auth;

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
            'img.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'                
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
        return view('edit', compact('apt'));
    }

    public function update(request $request, $id){

        $data = $request -> all();
        $apt = Apartment::findOrFail($id);
        $usrid = Auth::user() -> id;
        $apt-> update($data);
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
}
