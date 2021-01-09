<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signUp');
    Route::post('register', 'AuthController@register');


    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

        // prestamos
        Route::get('prestamos', 'PrestamoApiController@index');
        Route::post('prestamos', 'PrestamoApiController@store');

        //FCM
        Route::post('/fcm/token', 'FirebaseController@sendAll');
    });
});










