<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sponsorship;
use Faker\Generator as Faker;

$factory->define(Sponsorship::class, function (Faker $faker) {
    return [
        'price'         => $faker -> randomFloat($nbMaxDecimals = 2, $min = 0.99, $max = 10),
        'hours'         => $faker -> randomElement($array = array (48, 72, 144)),
    ];
});
