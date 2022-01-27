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

Route::get('/games', 'GameController@index');
Route::get('/games/create', 'GameController@create');
Route::post('/games', 'GameController@store');
Route::get('/games/{game}', 'GameController@show');
Route::get('/games/{game}/edit', 'GameController@edit');
Route::put('/games/{game}', 'GameController@update');
Route::delete('/games/{game}', 'GameController@delete');

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');
