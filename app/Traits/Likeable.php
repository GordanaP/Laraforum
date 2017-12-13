<?php

namespace App\Traits;

use Auth;
use App\Like;

trait Likeable
{
    protected static function bootLikeable()
    {
        static::deleting(function($model){
            $model->likes()->delete();
        });
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function isLiked()
    {
        // property instead of relationship b/c likes are loaded with every reply
        return (bool) $this->likes->where('user_id', Auth::id())->count();
    }

    public function getIsLikedAttribute()
    {
        return $this->isLiked();
    }

    public function getLikesCountAttribute()
    {
        return $this->likes->count() > 0 ? $this->likes->count() : '';
    }

    public function scopeLiked($query)
    {
        return $this->whereHas('likes', function($query) {
            $query->where('user_id', Auth::id());
        });
    }
}