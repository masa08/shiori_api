<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'cors'], function () {
    Route::post('login', 'Api\SessionsController@login');
    Route::post('register', 'Api\SessionsController@register');
    Route::post('logout', 'Api\SessionsController@logout');
    Route::options('sentence', 'Api\SentenceController@store');
    Route::resource('sentence', 'Api\SentenceController', ['only' => ['index', 'show', 'store']]);
    Route::resource('book', 'Api\BookController', ['only' => ['index']]);
    Route::resource('users', 'Api\UserController', ['only' => ['show', 'update']]);

    // TODO: JWTの再設定
    Route::group(['middleware' => 'auth.jwt'], function () {
    });
});
