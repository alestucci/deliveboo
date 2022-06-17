<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('homepage');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//Route::post('/slugger', 'UserController@slugger')->name('slugger');

Route::middleware('auth')
    ->namespace('User')
    ->name('user.')
    ->prefix('user')
    ->group(function () {
        //Route::get('/', 'HomeController@index')->name('home');
        // Route::post('/slugger', 'UserController@slugger')->name('slugger');
        Route::resource('/', 'UserController');
        Route::resource('/dishes', 'DishController');
});


Route::get("{any?}", function() {
    return view("guests.home");
})->where("any", ".*");
