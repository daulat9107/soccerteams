<?php

use Faker\Generator as Faker;

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence,
        'logo_uri'=>$faker->imageUrl($width = 100, $height = 100),
        'user_id'=>1
    ];
});
