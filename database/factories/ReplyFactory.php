<?php

use App\Thread;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random(),
        'thread_id' => Thread::all()->random(),
        'body' => $faker->paragraph,
    ];
});
