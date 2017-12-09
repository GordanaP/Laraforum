<?php

namespace App\Traits;

use App\Like;

trait Likeable
{
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function isLikedBy($user)
    {
        // property instead of relationship b/c likes are loaded with every reply
        return (bool) $this->likes->where('user_id', $user->id)->count();
    }

    public function getLikesCountAttribute()
    {
        return $this->likes->count() > 0 ? $this->likes->count() : '';
    }

    public function scopeLikedBy($query, $user)
    {
        return $this->whereHas('likes', function($query) use($user) {
            $query->where('user_id', $user->id);
        });
    }
}
