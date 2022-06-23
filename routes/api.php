<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/v1/users', 'Api\UserController@index');
Route::get('/v1/metadata', 'Api\MetadataController@index');
// Route::get('/v1/dishes', 'Api\DishController@index');

Route::get('token', 'Api\TokenController@index')->name('payment.process');

// Route::get('token', 'Api\TokenController@index');
// Route::post('token', 'Api\TokenController@post');

// Route::get('/payment/process', 'PaymentsController@process')->name('payment.process');
