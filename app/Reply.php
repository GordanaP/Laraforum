<?php

namespace App;

use Auth;
use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Likeable;

    protected $fillable = ['body'];

    protected $with = ['user', 'likes'];

    protected $appends = ['likesCount', 'isLiked'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function getFormattedCreatedAttribute()
    {
        return $this->created_at->diffForHUmans();
    }

    public static function new($request)
    {
        $reply = new static;

        $reply->body = $request->body;
        $reply->user()->associate(Auth::id());

        return $reply;
    }

    public function like($like)
    {
        return $this->likes()->save($like);
    }

    public function unlike()
    {
        return $this->likes()->where('user_id', Auth::id())->delete();
    }
}
