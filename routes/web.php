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


Route::group(['middleware' => ['auth']], function(){//ミドルウェアをauthで定義することで、ルーティングがログアウトユーザーから来たら防ぐ
    Route::get('/posts', 'PostController@index')->name('home');//ログイン後の画面 //->middleware('auth')
    Route::get('/posts/{game}', 'PostController@show');
    Route::get('/posts/{game}/create', 'PostController@create');
    Route::post('/posts/{game}', 'PostController@store');
});

Auth::routes();



