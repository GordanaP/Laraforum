<?php

use App\User;
use App\Thread;
use Faker\Generator as Faker;

$factory->define(App\Subscription::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->unique()->random(),
        'thread_id' => Thread::all()->unique()->random(),
    ];
});
