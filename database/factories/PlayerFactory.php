<?php

use Faker\Generator as Faker;

$factory->define(\App\Player::class, function (Faker $faker) {
    return [
        'member_id' => $faker->randomElement(\App\Member::all()->pluck('id')->toArray()),
   		'game_id' => $faker->randomElement(\App\Game::all()->pluck('id')->toArray()),
        'score' => $faker->numberBetween(0, 500),
    ];
});
