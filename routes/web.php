<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/', 'PostController@index');
Route::get('/posts/create', 'PostController@create')->middleware('auth');
Route::post('/posts', 'PostController@store')->middleware('auth');
Route::get('/posts/{post}', 'PostController@show');
Route::put('/posts/{post}', 'PostController@update')->middleware('auth');
Route::delete('/posts/{post}', 'PostController@destroy')->middleware('can:delete,post');
Route::get('/posts/{post}/edit', 'PostController@edit')->middleware('can:update,post');


Route::post('/comments', 'CommentController@store')->middleware('auth');
Route::delete('/comments/{comment}', 'CommentController@destroy')->middleware('can:delete,comment');


Route::get('/author/{user}/posts', 'AuthorPostController@index');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');