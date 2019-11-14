<?php

use Faker\Generator as Faker;

$factory->define(\App\Game::class, function (Faker $faker) {
    return [
        'occurplace' => $faker->city,
        'occurdate' => $faker->date(),
    ];
});
