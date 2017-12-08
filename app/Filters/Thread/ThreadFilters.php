<?php

namespace App\Filters\Thread;

use App\Filters\Filters;
use App\User;
use Carbon\Carbon;

class ThreadFilters extends Filters
{
    protected $filters = ['user', 'popular', 'trending'];

    protected function user($name)
    {
        $user = User::whereName($name)->first();

        if($user)
        {
            return $this->builder->where('user_id', $user->id);
        }
    }

    protected function popular($bool)
    {
        if($bool === '1')
        {
            $this->builder->getQuery()->orders = [];
            return $this->builder->orderBy('replies_count', 'desc');
        }
    }

    protected function trending($bool)
    {
        if($bool === '1')
        {
            $this->builder->where('created_at', '>', \Carbon\Carbon::now()->subWeek());
        }
    }
}