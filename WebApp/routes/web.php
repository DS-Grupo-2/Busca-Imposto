<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\System;
use App\Http\Controllers\User;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home2',
    [Home::class, 'index']
);

Route::get('/system/user-info',
    [User::class, 'userInfo']
)->middleware('auth')->name('user-info');

Route::post('/system/user-info',
    [User::class, 'saveUserInfo']
)->middleware('auth')->name('save-user-info');




Route::get('/home',
    [User::class, 'userInfo']
)->middleware('auth')->name('user-info');;
