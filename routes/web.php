<?php

use Illuminate\Support\Facades\Route;



Auth::routes();


Route::get('/', 'GuestController@index') -> name('home');

Route::get('/show/{id}', 'GuestController@show') -> name('apt-show');

Route::get('/create', 'LoggedController@create')->name('apt-create');

Route::post('/create/store', 'LoggedController@store' ) -> name('apt-store');

Route::get('/edit/{id}', 'LoggedController@edit')->name('apt-edit');

Route::post('/update/{id}', 'LoggedController@update' ) -> name('apt-update');

Route::get('/delete/{id}', 'LoggedController@delete') -> name('apt-delete');

Route::get('/profile/{id}', 'LoggedController@profile') -> name('profile');