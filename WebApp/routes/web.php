<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\System;
use App\Http\Controllers\Categories;
use App\Http\Controllers\Products;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


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

/**Users Routes */
    Route::get(
        '/system/user-info',
        [User::class, 'userInfo']
    )->middleware('auth')->name('user-info');

    Route::post(
        '/system/user-info',
        [User::class, 'saveUserInfo']
    )->middleware('auth')->name('save-user-info');
    Route::get(
        '/home',
        [User::class, 'userInfo']
    )->middleware('auth')->name('user-info');;
    Route::get(
        '/system/user-delete',
        [User::class, 'delete']
    )->middleware('auth')->name('user-delete');;
/**End USER Routes */


/**Categories Routes */
    Route::get(
        '/system/categories',
        [Categories::class, 'index']
    )->middleware('auth')->name('categories-view');

    Route::post(
        '/system/categories/create',
        [Categories::class, 'create']
    )->middleware('auth')->name('categories-create');

    Route::get(
        '/system/categories/edit/{id}',
        [Categories::class, 'edit']
    )->middleware('auth')->name('categories-edit');

    Route::post(
        '/system/categories/edit/{id}',
        [Categories::class, 'edit']
    )->middleware('auth')->name('categories-edit');

    Route::get(
        '/system/categories/delete/{id}',
        [Categories::class, 'delete']
    )->middleware('auth')->name('categories-delete');
/**End Categories Routes */


/**Products Routes */
    Route::get(
        '/system/products',
        [Products::class, 'index']
    )->middleware('auth')->name('products-view');

    Route::post(
        '/system/products/create',
        [Products::class, 'create']
    )->middleware('auth')->name('products-create');

    Route::get(
        '/system/products/edit/{id}',
        [Products::class, 'edit']
    )->middleware('auth')->name('products-edit');

    Route::post(
        '/system/products/edit/{id}',
        [Products::class, 'edit']
    )->middleware('auth')->name('products-edit');

    Route::get(
        '/system/products/delete/{id}',
        [Products::class, 'delete']
    )->middleware('auth')->name('products-delete');
/**End products Routes */


Route::get('/system/user-info',
    [User::class, 'userInfo']
)->middleware('auth')->name('user-info');

/**Subcategories Routes */
/**End Subcategories Routes */


/**Home routes */
    Route::get(
        '/home2',
        [Home::class, 'index']
    );
    Route::get(
        '/',
        [Home::class, 'index']
    );
/**End Home Routes */

/**TEST routes */

Route::get('/system/test', function () {
    return view('logged.test');
})->name('logged-test');
Route::get('/home/test', function () {
    return view('unlogged.test');
})->name('unlogged-test');
/**End TEST Routes */

Route::post('/home', 'UserController@update_avatar');


Route::get('/home',
    [User::class, 'userInfo']
)->middleware('auth')->name('user-info');;

