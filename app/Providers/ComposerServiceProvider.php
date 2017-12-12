<?php

namespace App\Providers;

use App\ViewComposers\CategoriesComposer;
use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer(['partials.sidebar._categories', 'threads.partials._form'], CategoriesComposer::class);
    }
}
