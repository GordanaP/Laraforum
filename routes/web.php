<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Thread
Route::resource('/threads', 'ThreadController');


// Redirects all non-existing routes to index route
Route::any('{query}', function() {
    return redirect('/');
})->where('query', '.*');
