<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['namespace' => 'App\Http\Controllers\API'], function () {
    Route::group(['controller' => 'AuthController'], function() {
        Route::post('login', 'login')->name('login');
        Route::post('register', 'register')->name('register');
        Route::post('send/otp', 'sendOTP')->name('send.otp');
        Route::post('verify/otp', 'verifyOTP')->name('verify.otp');
        Route::post('change/password', 'changePassword')->name('change.password');
    });

    
});
