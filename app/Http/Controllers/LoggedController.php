<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use App\Image;
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

        $data = $request -> all();

        $id = Auth::user() -> id;

        $data['user_id'] = $id;

        $newApt = Apartment::create($data);

        if(array_key_exists('services', $data)){
            
            $newApt -> services() -> attach($data['services']);

        }
        
        

        if($request -> hasFile('img')){

            $name = $request -> img -> getClientOriginalName();
        
            $url = $request -> img -> storeAs('images' . $newApt -> id, $name, 'public');

            $file = Image::create([
                 'img' => '/storage/' . $url,
                 'apartment_id' => $newApt -> id
             ]);
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
}
