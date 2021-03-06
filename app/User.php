<?php

namespace App;

use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email', 'created_at', 'updated_at', 'id'
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class)->latest()->with('category', 'user');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function saveThread($thread)
    {
        $this->threads()->save($thread);
    }

    public function getFormattedCreatedAttribute()
    {
        return $this->created_at->diffForHUmans();
    }

    public function owns($related)
    {
        return $this->id == $related->user_id;
    }
}
