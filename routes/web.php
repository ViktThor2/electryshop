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
    Route::get('/termekek/{id}', 'ProductController@index')->name('product.index');
    Route::get('/termek/{id}', 'ProductController@show')->name('product.show');

    // Termék szürő
    Route::get('/termekek/szures', 'ProductFilterController@filterProduct')->name('product.filter.category');
    Route::post('/termekek/kereses', 'ProductFilterController@search')->name('product.search');

    // Kosár
    Route::get('/kosar', 'ShopCartController@index')->name('scart.index');

    Route::middleware('shopcart_product_check')->group(function () {
      Route::get('/kosarba/{itemId}/hozzaad', 'ShopCartController@add')->name('scart.add');
    });

    Route::get('/kosarba/{itemId}/plus', 'ShopCartController@plus')->name('scart.plus');
    Route::get('/kosarba/{itemId}/minus', 'ShopCartController@minus')->name('scart.minus');
    Route::get('/kosarba/{itemId}/torles', 'ShopCartController@destroyProduct')->name('scart.delete');
    Route::get('/kosarba/urites', 'ShopCartController@destroyCart')->name('scart.delete.all');

    // Belépett Vásrló
    Route::middleware('customer_auth')->group(function () {

        // Rendelések
        Route::get('/rendeles', 'OrderController@create')->name('order.create');
        Route::post('/rendeles', 'OrderController@store')->name('order.store');
        Route::get('/rendeles/osszegzes', 'OrderController@finalCreate')->name('order.final.create');
        Route::get('/rendeles/lead', 'OrderController@finalStore')->name('order.final.store');

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

        // Vásárlók
        Route::get('/admin/vasarlok', 'CustomerController@index')->name('admin.customer.index');
        Route::get('/admin/vasarlok/uj', 'CustomerController@create')->name('admin.customer.create');
        Route::post('/admin/vasarlok/uj', 'CustomerController@store')->name('admin.customer.store');

        // Termékek
        Route::get('/admin/termekek', 'ProductController@index')->name('admin.product.index');
        Route::get('/admin/termek/letrehoz', 'ProductController@create')->name('admin.product.create');
        Route::post('/admin/termek/letrehoz', 'ProductController@store')->name('admin.product.store');
        Route::get('/admin/termek/torles/{id}', 'ProductController@destroy')->name('admin.product.delete');

        // Termék Szürés
        Route::get('/admin/termekek/szures', 'ProductController@filterCategory')->name('admin.product.filter.category');

        // Rendelések
        Route::get('/admin/rendelesek', 'OrderController@index')->name('admin.order.index');
        Route::get('/admin/rendelesek/uj', 'OrderController@create')->name('admin.order.create');
        Route::post('/admin/rendelesek/uj', 'OrderController@store')->name('admin.order.store');

        // Szállítási Módok
        Route::get('/admin/szallitas', 'DeliveryController@index')->name('admin.delivery.index');
        Route::post('/admin/szallitas/uj', 'DeliveryController@store')->name('admin.delivery.store');

        // Termékek Szállítási módja
        Route::get('/admin/termekek/szallitas', 'ProductDeliveryController@index')->name('admin.product.delivery.index');
        Route::get('/admin/termekek/szallitas/modosit/{productId}', 'ProductDeliveryController@edit')->name('admin.product.delivery.edit');
        Route::post('/admin/termekek/szallitas/modosit/{productId}', 'ProductDeliveryController@update')->name('admin.product.delivery.update');

    });

});
