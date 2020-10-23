<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;

class ApiController extends Controller
{
    public function getAllData() {

        $data = Apartment::all();

        return response()->json($data);
    }
}
