<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => $faker ->randomElement($array = array ('WI-FI', 'Swimming Pool', 'Free Parking', 'SPA', 'H24 Check-In')) 
        
    ];
});
