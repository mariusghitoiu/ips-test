<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->randomElement(['5d18a83c1c330@test.com',
            '5d1905fa50476@test.com', '5d35a3d62f83e@test.com', '5d35a431b9ed1@test.com',
            '5d2f8fac36da7@test.com', '5d358e898567d@test.com', '5d358e8a366f7@test.com'
        ]),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
