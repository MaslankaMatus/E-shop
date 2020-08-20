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

Auth::routes();

Route::get('/', 'OrdersController@index')->name('home');
Route::get('/home', 'OrdersController@index')->name('home');
Route::get('/pdf', 'UsersController@pdf')->name('pdf');


Route::resource('orders', 'OrdersController');
Route::resource('users', 'UsersController', ['middleware' => 'auth:admin']);
