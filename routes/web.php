<?php

use Illuminate\Support\Facades\Route;



Auth::routes();




Route::get('/', 'GuestController@index') -> name('home');


