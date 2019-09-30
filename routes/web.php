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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// facebook Socialite Route
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');// this (provider) means user can login any social name like facbook or google
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');