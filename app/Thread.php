<?php

namespace App;

use Auth;
use App\Observers\ThreadObserver;
use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use Likeable;

    protected $fillable = ['title', 'body'];

    protected $appends = ['isSubscribed'];

    protected static function boot()
    {
        parent::boot();

        static::observe(ThreadObserver::class);

        static::addGlobalScope('replyCount', function($builder){
            $builder->withCount('replies');
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function getFormattedCreatedAttribute()
    {
        return $this->created_at->diffForHUmans();
    }

    public static function new($request)
    {
        $thread = new static;

        $thread->title = $request->title;
        $thread->body = $request->body;
        $thread->category()->associate($request->category);

        return $thread;
    }

    public function changed($request)
    {
        $this->title = $request->title;
        $this->body = $request->body;
        $this->category()->associate($request->category);

        return $this;
    }

    public function addReply($reply)
    {
        $this->replies()->save($reply);
    }

    public function subscribe($subscription)
    {
        $this->subscriptions()->save($subscription);
    }

    public function unsubscribe($user = null)
    {
        $this->subscriptions()->where('user_id', $user->id ?: Auth::id())->delete();
    }

    public function isSubscribedBy($user = null)
    {
        return (bool) $this->subscriptions->where('user_id', $user->id ?: Auth::id())->count();
    }

    public function getisSubscribedAttribute()
    {
        return (bool) $this->subscriptions->where('user_id', Auth::id())->count();
    }

}