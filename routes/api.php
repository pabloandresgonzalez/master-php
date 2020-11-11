<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'AuthController@login');


Route::group([
    'prefix' => 'auth'
], function () {

    Route::post('signup', 'AuthController@signUp');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::post('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});




