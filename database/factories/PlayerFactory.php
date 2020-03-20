<?php

use Faker\Generator as Faker;
use Faker\Provider\en_US\Person;
$factory->define(App\Player::class, function (Faker $faker) {
    return [
        'user_id'           =>1,
        'team_id'           =>1,
        'first_name'        =>$faker->firstName($gender=  'male'|'female'),
        'last_name'         =>$faker->lastName,
        'player_image_uri'  =>$faker->imageUrl($width = 100, $height = 100),
    ];
});
