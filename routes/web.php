<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'App\Http\Controllers\IndexController@home') -> name('home');
Route::get('about', 'App\Http\Controllers\IndexController@about') -> name('about');
Route::get('contact', 'App\Http\Controllers\IndexController@contact') -> name('contact');

Route::post('register', 'App\Http\Controllers\UserController@userRegister') -> name('user.register');
Route::post('login', 'App\Http\Controllers\UserController@userLogin') -> name('user.login');

Route::group(['middleware' => 'auth'], function () {

    Route::get('new-blog', 'App\Http\Controllers\BlogController@index') -> name('new.blog');
    Route::post('save-blog', 'App\Http\Controllers\BlogController@create') -> name('save.blog');


    Route::post('logout', 'App\Http\Controllers\UserController@logout') -> name('logout');

});

