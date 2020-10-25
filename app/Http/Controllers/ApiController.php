<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class ApiController extends Controller
{

    // public function search() {

    //     $data = Apartment::all();

    //     return response() -> json($data);
    // }
    public function search(request $request){

        $request -> all();

        return response() -> json($request);
    }
}
