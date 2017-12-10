<?php

use App\Reply;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Like::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->unique()->random(),
        'likeable_id' => Reply::all()->unique()->random(),
        'likeable_type' => 'App\Reply'
    ];
});
