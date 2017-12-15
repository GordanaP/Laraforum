<?php

namespace App\Traits;

use Auth;
use App\Subscription;

trait Subscribable
{
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function subscribe($subscription)
    {
        $this->subscriptions()->save($subscription);
    }

    public function unsubscribe($user = null)
    {
        $this->subscriptions()
            ->where('user_id', $user->id ?: Auth::id())->delete();
    }

    public function isSubscribedBy($user = null)
    {
        return (bool) $this->subscriptions
            ->where('user_id', $user->id ?: Auth::id())->count();
    }

    public function getisSubscribedAttribute()
    {
        return (bool) $this->subscriptions
            ->where('user_id', Auth::id())->count();
    }

    public function notifySubscribersAbout($reply)
    {
        return $this->subscriptions
            ->where('user_id', '!=', $reply->user_id)
            ->each
            ->notify($reply);
    }
}