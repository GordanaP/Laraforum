<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $timestamps = false;

    public function likeable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function new($model)
    {
        $like = new static;

        $like->user()->associate(Auth::id());

        return $like;
    }
}
