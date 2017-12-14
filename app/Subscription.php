<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public static function new($user = null)
    {
        $subscription = new static;

        $subscription->user()->associate($user->id ?: Auth::id());

        return $subscription;
    }
}
