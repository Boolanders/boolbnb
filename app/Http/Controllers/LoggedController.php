<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Facades\Auth;

class LoggedController extends Controller {

    public function __construct(){
    
        $this->middleware('auth');
    
    }

    public function show($id) {

        $apt = Apartment::findOrFail($id);
        return view ('show', compact('apt'));
    }

    public function create() {

        return view ('create');
    }

    public function store(request $request){ 

        $data = $request -> all();
        $id = Auth::user() -> id;
        $data['user_id'] = $id;
        $mail = Apartment::create($data);
        return redirect() -> route('profile', $id);
    }

    public function edit($id) {

        $mail = Apartment::findOrFail($id);
        return view('edit', compact('Apartment'));
    }

    public function update(request $request, $id){

        $data = $request -> all();
        $apt = Apartment::findOrFail($id);
        $apt-> update($data);
        return redirect() -> route('show', $id);
    }

    public function delete($id) {

        $apt= Apartment::findOrFail($id);
        $apt-> delete();
        return redirect() -> route('home');
    }


    public function profile($id) {

        $apts= Apartment::where('user_id', '=', $id ) -> get();
        return view('profile', compact('apts'));
    }
}
