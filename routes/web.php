<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Thread
Route::get('/threads/create', 'ThreadController@create')->name('threads.create');
Route::get('/threads/{category?}', 'ThreadController@index')->name('threads.index');
Route::get('/threads/{category}/{thread}', 'ThreadController@show')->name('threads.show');
Route::resource('/threads', 'ThreadController', [
    'except' => ['index', 'create', 'show']
]);

// Reply
Route::group(['prefix' => 'threads/{thread}'], function() {
    Route::resource('/replies', 'ReplyController');
});

// Favorite
Route::post('reply/{reply}/likes', 'LikeController@store')->name('likes.store');

// Redirects all non-existing routes to index route
Route::any('{query}',
  function() { return redirect('/'); })
  ->where('query', '.*');