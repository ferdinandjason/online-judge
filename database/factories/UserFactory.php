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
        'username' => $faker->userName,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'email' => $faker->unique()->safeEmail,
        'real_name' => $faker->name,
        'isAdmin' => 0,
        'avatar_path' => 'user/images/user.png',
        'institution' => $faker->company,
        'total_submission' => 0,
        'total_ac' => 0,
        'remember_token' => null,
    ];
});
