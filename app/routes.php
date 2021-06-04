<?php

use BulveyzRouter\Route;

Route::setNamespace('App\Controllers');

Route::get('/', 'Main\MainController@index')->name('main.index');
Route::get('/logout', 'Main\MainController@logout')->name('logout');
Route::get('/category/{id}', 'Main\MainController@catgeory')->name('main.category');
Route::get('/carts', 'Main\CartController@index')->name('cart.index');
Route::get('/carts/delete/{rowId}', 'Main\CartController@delete')->name('cart.delete');
Route::get('/carts/add/{id}', 'Main\CartController@add')->name('cart.add');
Route::get('/product/{id}', 'Main\MainController@single')->name('product.single');


Route::get('/login', 'Auth\LoginController@index')->name('auth.index');
Route::post('/auth/login', 'Auth\LoginController@login')->name('auth.login');
//

Route::get('/user/index', 'User\PanelController@orders')->name('user.orders');
Route::get('/user/order/{id}', 'User\PanelController@showOrderDetails')->name('user.orders.details');
Route::get('/user/profile', 'User\PanelController@profile')->name('user.profile');
Route::post('/user/edit/profile', 'User\PanelController@editProfile')->name('user.edit.profile');
Route::get('/checkout/index', 'Main\CheckoutController@getCheckout')->name('checkout.index');
Route::post('/checkout/store', 'Main\CheckoutController@storeOrderDetails')->name('checkout.store');

//dashboard routes
Route::get('/dashboard/index', 'Dashboard\DashboardController@index')->name('dashboard.index');
