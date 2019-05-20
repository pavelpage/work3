<?php

use Faker\Generator as Faker;
use \App\Parcel;

$factory->define(Parcel::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->word,
        'from' => $faker->city,
        'to' => $faker->city,
        'km_domestic' => $faker->numberBetween(0, 100),
        'km_international' => $faker->numberBetween(0, 100),
    ];
});
