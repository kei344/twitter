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

Route::get('/', function () {
    return view('welcome');
});
//  signup機能
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//  login機能
Route::get('login', 'Auth\loginController@showLoginForm')->name('login.get');
Route::post('login', 'Auth\loginController@login')->name('login.post');
Route::get('logout', 'Auth\loginController@logout')->name('logout.get');