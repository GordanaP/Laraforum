<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Thread
Route::resource('/threads', 'ThreadController');

// Reply
Route::group(['prefix' => 'threads/{thread}'], function() {
    Route::resource('/replies', 'ReplyController');
});


// Redirects all non-existing routes to index route
Route::any('{query}', function() {
    return redirect('/');
})->where('query', '.*');
