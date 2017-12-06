<?php

namespace App\Observers;

use App\Thread;

class ThreadObserver
{
    public function creating(Thread $thread)
    {
        $thread->slug = str_slug($thread->title);
    }

    public function updating(Thread $thread)
    {
        $thread->slug = str_slug($thread->title);
    }
}
