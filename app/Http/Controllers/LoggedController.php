<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class LoggedController extends Controller
{
    public function show($id) {

        $apt = Apartment::findOrFail($id);
        return view ('show', compact('apt'));
    }

    public function create() {

        return view ('create');
    }

    public function store(request $request){ 

        $data = $request -> all();
        $mail = Apartment::create($data);
        return redirect() -> route('home');
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
}
