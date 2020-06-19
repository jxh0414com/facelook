<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::prefix('user')->namespace('auth')->group(function () {
    Route::post('/register', 'UserController@register');
    Route::post('/password/forgot', 'ForgotController@forgot');
    Route::get('/password/{token}/verify', 'ForgotController@verify');
    Route::post('/password/reset', 'ForgotController@reset');
    Route::get('/{identifier}/getUser', 'UserController@getUserByIdentifier');
});

Route::prefix('auth')->namespace('auth')->group(function () {
   Route::post('/login', 'AuthController@login');
   Route::get('/me', 'AuthController@me');
   Route::get('/logout', 'AuthController@logout');
});
