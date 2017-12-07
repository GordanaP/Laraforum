<?php

namespace App;

use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        static::observe(CategoryObserver::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    public function getFormattedNameAttribute()
    {
        return ucfirst($this->name);
    }
}
