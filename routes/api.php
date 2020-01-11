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
Route::middleware(['cors'])->group(function () {
    Route::post('login', 'Api\SessionsController@login');
    Route::post('register', 'Api\SessionsController@register');

    Route::group(['middleware' => 'auth.jwt'], function () {
        Route::get('logout', 'Api\SessionsController@logout');
        Route::resource('users', 'Api\UserController', ['only' => ['show', 'edit', 'update']]);
    });
});