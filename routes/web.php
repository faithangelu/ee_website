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

// Auth::routes();
// Route::get('/logout', 'Auth\LoginController@logout');
Route::get('login', 'AuthController@showLoginForm')->name('login'); 
Route::post('login', 'AuthController@user_login')->name('user_login');

Route::get('register', 'AuthController@showRegisterForm')->name('register');
Route::post('register', 'AuthController@register')->name('register');

Route::get('dashboard', 'AuthController@dashboard'); 

Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('/', 'WebsiteController@index')->name('index');
Route::get('/home', 'UserController@marketplace')->name('home');
Route::get('/profile', 'UserController@profile')->name('profile');


