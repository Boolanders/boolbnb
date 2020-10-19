<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

<<<<<<< HEAD
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======


Route::get('/', 'HomeController@index')->name('home');
>>>>>>> 026ac4999f7699ce1d420bb5e818355ae39b34c3
