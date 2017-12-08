<?php

namespace App;

use App\Observers\ThreadObserver;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['title', 'body'];

    public $appends = ['replyCount'];

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

    public function addReply($reply)
    {
        $this->replies()->save($reply);
    }

}