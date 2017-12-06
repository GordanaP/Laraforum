<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Thread::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random(),
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});
