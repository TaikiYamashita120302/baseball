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
//管理ユーザー
Route::group(['middleware' => ['auth', 'can:admin']], function(){
    Route::get('/games', 'GameController@index');
    Route::get('/games/create', 'GameController@create');
    Route::post('/games', 'GameController@store');
    Route::get('/games/{game}', 'GameController@show');
    Route::get('/games/{game}/edit', 'GameController@edit');
    Route::put('/games/{game}', 'GameController@update');
    Route::delete('/games/{game}', 'GameController@delete');
});



//一般ユーザー
    Route::get('login/google', 'Auth\LoginController@redirectToGoogle');//Google API
    Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');
    
    Route::get('/', 'PostController@index')->name('home');//ログイン後の画面 //->middleware('auth'),トップページだから/にする！
    Route::get('/posts/{game}', 'PostController@show');
Route::group(['middleware' => ['auth']], function(){//ミドルウェアをauthで定義することで、ルーティングがログアウトユーザーから来たら防ぐ<=>ログアウトユーザーのアクセスの制限
    
    Route::get('/posts/{game}/create', 'PostController@create');
    Route::post('/posts/{game}', 'PostController@store');
    Route::get('/posts/{game}/{post}/like', 'PostController@like');
    Route::get('/posts/{game}/{post}/unlike', 'PostController@unlike');
    Route::get('/posts/{game}/{post}/showlike', 'PostController@showlike');
    ROUTE::delete('/posts/{post}', 'PostController@delete');
    
    Route::get('/user', 'UserController@index');// /userはログインユーザー
    Route::get('/user/{user}/edit', 'UserController@edit');
    Route::put('/user/{user}', 'UserController@update');
    Route::get('/other_user/{user}', 'UserController@other_index');// /otherほかの人のプロフィール画面、{}の中身は、遷移前のリンクの$の後を入れる（$userなら{user}とする)
    Route::get('/other_user/{user}/follow', 'UserController@follow');//フォロー
    Route::get('/other_user/{user}/unfollow', 'UserController@unfollow');//フォロー解除
    Route::get('/other_user/{user}/showfollow', 'UserController@showfollow');//フォロー
    Route::get('/other_user/{user}/showfollower', 'UserController@showfollower');//フォロワー
});

Auth::routes();



