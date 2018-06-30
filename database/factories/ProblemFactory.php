<?php

use Faker\Generator as Faker;

$factory->define(App\Problem::class, function (Faker $faker) {
    return [
        'slug' => $faker->randomLetter,
        'title' => $faker->title,
        'description' => $faker->text,
        'sample_input' => $faker->text,
        'sample_output' => $faker->text,
        'time_limit' => 1,
        'memory_limit' => 64,
        'contest_only' => false,
    ];
});
