<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\System;
use App\Http\Controllers\Categories;
use App\Http\Controllers\Products;
use App\Http\Controllers\SubCategories;
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

    Route::get('/system/user-info',
    [User::class, 'userInfo']
    )->middleware('auth')->name('user-info');

    Route::post('/home', 'UserController@update_avatar');

    Route::get('/home',
        [User::class, 'userInfo']
    )->middleware('auth')->name('user-info');;
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

    Route::post('/categories/edit', 'CategoriesController@update_picture');

    Route::get(
        '/categories',
        [Categories::class, 'pag_categorias']
    );
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

    Route::get(
        '/system/saved-products',
        [Products::class, 'getSaveds']
    )->middleware('auth');

    Route::post(
        '/system/products/edit/{id}',
        [Products::class, 'edit']
    )->middleware('auth')->name('products-edit');

    Route::get(
        '/system/products/delete/{id}',
        [Products::class, 'delete']
    )->middleware('auth')->name('products-delete');
        
    // Route::get(
    //     'search-by-product',
    //     [Products::class, 'getMatchedProducts']
    // )->name('search-by-product');
    Route::get(
        '/search',
        [Products::class, 'getMatchedProductsXHR']
    )->name('search-by-product');

    Route::get(
        '/get-products',
        [Products::class, 'getProducts']
    );

    Route::get(
        '/product/{id}',
        [Products::class, 'getProduct']
    );

    Route::get(
        '/save-product/{id}',
        [Products::class, 'saveProduct']
    );


    Route::get(
        '/system/get-bests',
        [Products::class, 'getBests']
    )->middleware('auth');
/**End products Routes */


/**Subcategories Routes */
Route::get(
    '/system/subcategories',
    [SubCategories::class, 'index']
)->middleware('auth')->name('subcategories-view');

Route::post(
    '/system/subcategories/create',
    [SubCategories::class, 'create']
)->middleware('auth')->name('subcategories-create');

Route::get(
    '/system/subcategories/edit/{id}',
    [SubCategories::class, 'edit']
)->middleware('auth')->name('subcategories-edit');

Route::post(
    '/system/subcategories/edit/{id}',
    [SubCategories::class, 'edit']
)->middleware('auth')->name('subcategories-edit');

Route::get(
    '/system/subcategories/delete/{id}',
    [SubCategories::class, 'delete']
)->middleware('auth')->name('subcategories-delete');


Route::get(
    '/subcategory/{id}',
    [SubCategories::class, 'pagSubcategories']
);
/**End Subcategories Routes */

Route::get(
    '/manovai/{id}',
    [Products::class, 'get_data']
);
/**Home routes */
    Route::get(
        '/home2',
        [Home::class, 'index']
    );

    Route::get(
        '/',
        [Home::class, 'index']
    );

    Route::get(
        '/',
        [Categories::class, 'show']
    )->name('data-show');
/**End Home Routes */


/**Imposto routes */

Route::get(
    '/imposto/{id}',
    [Products::class, 'get_data']
)->name('data-imposto');

/**End Home Routes */


/**TEST routes */

Route::get('/system/test', function () {
    return view('logged.test');
})->name('logged-test');

Route::get(
    '/home/test/',
    [Products::class, 'get_data']
)->name('unlogged-test');

Route::get(
    '/home/test/{id}',
    [Products::class, 'get_data']
)->name('data-test');

/**End TEST Routes */

Route::post('/home', 'UserController@update_avatar');
// Route::post('/system/products', 'Products@update_product');


Route::get('/home',
    [User::class, 'userInfo']
)->middleware('auth')->name('user-info');;

