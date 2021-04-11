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

// Frontend
Route::namespace('Frontend')->group(function () {

    // Dashboard
    Route::get('/', 'IndexController@index')->name('index');

    // Vásárlók
    Route::get('/regisztracio', 'CustomerController@create')->name('customer.create');
    Route::post('/regisztracio', 'CustomerController@store')->name('customer.store');

    // Vásárlók Auth
    Route::get('/belepes', 'CustomerAuthController@create')->name('customer.auth.create');
    Route::post('/belepes', 'CustomerAuthController@store')->name('customer.auth.store');
    Route::delete('/kilepes', 'CustomerAuthController@destroy')->name('customer.auth.destroy');

    // Termékek
    Route::get('/termekek', 'ProductController@index')->name('product.index');
    Route::get('/termek/{$id}', 'ProductController@show')->name('product.show');

    // Termék szürő
    Route::get('/termekek/szures', 'ProductController@filterProduct')->name('product.filter');

    // Kosár
    Route::get('/kosar', 'ShopCartController@index')->name('scart.index');
    Route::get('/kosarba/{itemId}/hozzaad', 'ShopCartController@add')->name('scart.add');
    Route::get('/kosarba/{itemId}/plus', 'ShopCartController@plus')->name('scart.plus');
    Route::get('/kosarba/{itemId}/minus', 'ShopCartController@minus')->name('scart.minus');
    Route::get('/kosarba/{itemId}/torles', 'ShopCartController@destroyProduct')->name('scart.delete');
    Route::get('/kosarba/urites', 'ShopCartController@destroyCart')->name('scart.delete.all');

    // Belépett Vásrló
    Route::middleware('customer_auth')->group(function () {

        // Rendelések
        Route::get('/rendeles', 'OrderController@create')->name('order.create');
        Route::post('/rendeles', 'OrderController@store')->name('order.store');
        Route::get('/rendeles/osszegzes/{orderID}', 'OrderController@finalCreate')->name('order.final.create');
        Route::get('/rendeles/lead/{orderID}', 'OrderController@finalStore')->name('order.final.store');

        // Vásrlók
        Route::get('/profil/modosit/{customerId}', 'CustomerController@edit')->name('customer.edit');
        Route::put('/profil/modosit/{customerId}', 'CustomerController@update')->name('customer.update');

        // Vásárló Rendelései
        Route::get('/profil/rendelesek', 'CustomerOrderController@myorders')->name('customer.order.pivot');
        Route::get('/profil/rendeles/{orderId}', 'CustomerOrderController@show')->name('myorder.show');

    });

});


// Admin
Route::namespace('Admin')->group(function () {

    // Admin Auth
    Route::namespace('Auth')->group(function () {
        Route::get('/admin/belepes', 'LoginController@create')->name('admin.login.create');
        Route::post('/admin/belepes', 'LoginController@login')->name('admin.login.store');
        Route::get('/admin/kilepes', 'LoginController@logout')->name('admin.login.destroy');
    });

    // Belépett Admin
    Route::middleware('admin_auth')->group(function () {

        // Dashboard
        Route::get('/admin', 'AdminController@index')->name('admin.index');

        // Kategóriák
        Route::get('/admin/kategoriak', 'CategoryController@index')->name('admin.category.index');
        Route::get('/admin/kategoriak/letrehoz', 'CategoryController@create')->name('admin.category.create');
        Route::post('/admin/kategoriak/letrehoz', 'CategoryController@store')->name('admin.category.store');
        Route::post('/admin/alkategoriak/letrehoz', 'CategoryController@subCategoryStore')->name('admin.subCategory.store');

        // Termékek
        Route::get('/admin/termekek', 'ProductController@index')->name('admin.product.index');
        Route::get('/admin/termek/letrehoz', 'ProductController@create')->name('admin.product.create');
        Route::post('/admin/termek/letrehoz', 'ProductController@store')->name('admin.product.store');
        Route::get('/admin/termek/torles/{id}', 'ProductController@destroy')->name('admin.product.delete');

    });

});
