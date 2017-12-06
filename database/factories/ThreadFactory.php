<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Thread::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random(),
        'title' => $title = $faker->sentence,
        'slug' => str_slug($title),
        'body' => $faker->paragraph,
    ];
});
