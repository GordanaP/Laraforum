<?php

namespace App\ViewComposers;

use App\Category;
use Illuminate\View\View;

class CategoriesComposer
{
    public function compose(View $view)
    {
        $categories = Category::orderBy('name')->get();

        $view->with([
            'categories' => $categories,
        ]);
    }
}