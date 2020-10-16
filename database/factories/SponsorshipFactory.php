<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sponsorship;
use Faker\Generator as Faker;

$factory->define(Sponsorship::class, function (Faker $faker) {
    return [
        'price'         => $faker -> randomFloat($nbMaxDecimals = 2, $min = 0.99, $max = 10),
        'description'   => $faker -> sentence($nbWords = 10),
        'hours'         => $faker -> randomElements(24, 48, 72),
    ];
});
