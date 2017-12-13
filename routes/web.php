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
Route::put('/threads/{category}/{thread}', 'ThreadController@update')->name('threads.update');
Route::get('/threads/{category}/{thread}/edit', 'ThreadController@edit')->name('threads.edit');
Route::resource('/threads', 'ThreadController', [
    'except' => ['index', 'create', 'show', 'edit', 'update']
]);

// Reply
Route::resource('/replies', 'ReplyController', [
    'only' => ['update', 'destroy']
]);
Route::post('threads/{thread}/replies', 'ReplyController@store')->name('replies.store');

// Like
Route::post('replies/{reply}/likes', 'LikeController@store')->name('likes.store');
Route::delete('replies/{reply}/likes', 'LikeController@destroy')->name('likes.destroy');

// Profile
Route::resource('/profiles', 'ProfileController', [
    'parameters' => ['profiles' => 'user'],
]);

// Redirects all non-existing routes to index route
Route::any('{query}',
  function() { return redirect('/'); })
  ->where('query', '.*');