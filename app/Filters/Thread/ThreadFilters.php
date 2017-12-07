<?php

namespace App\Filters\Thread;

use App\Filters\Filters;
use App\User;

class ThreadFilters extends Filters
{
    protected $filters = ['user'];

    protected function user($name)
    {
        $user = User::whereName($name)->first();

        if($user)
        {
            return $this->builder->where('user_id', $user->id);
        }
    }
}