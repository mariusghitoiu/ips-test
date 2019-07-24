<?php

use App\Module;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\UserProgress::class, function (Faker $faker) {

    $startedAt = $faker->dateTimeBetween('-1 year', '-1 month');
    $endedAt = $faker->randomElement([$faker->dateTimeBetween('-27 day', '-1 day'), null]);

    return [
        'user_id' => $faker->numberBetween(1,5),
        'module_id' => $faker->numberBetween(1,21),
        'started_at' => $startedAt,
        'ended_at' => $endedAt,
    ];
});
