<?php

use Faker\Generator as Faker;
use \App\Parcel;

$factory->define(Parcel::class, function (Faker $faker) {

    $domestic = $faker->numberBetween(0, 100);
    $international = $faker->numberBetween(0, 100);

    return [
        //
        'title' => $faker->word,
        'from' => $faker->city,
        'to' => $faker->city,
        'km_domestic' => $domestic,
        'km_international' => $international,
        'price' => config('app.domestic_per_km') * $international + config('app.international_per_km') * $international,
    ];
});
