<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/v1/users', 'Api\UserController@index');
// Route::get('/v1/dishes', 'Api\DishController@index');

