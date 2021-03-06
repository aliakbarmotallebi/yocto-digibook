<?php

use BulveyzRouter\Route;

Route::setNamespace('App\Controllers');


//main [page] routes
Route::get('/', 'Main\MainController@index')->name('main.index');
Route::get('/logout', 'Main\MainController@logout')->name('logout');
Route::get('/category/{id}', 'Main\MainController@catgeory')->name('main.category');
Route::get('/carts', 'Main\CartController@index')->name('cart.index');
Route::get('/carts/delete/{rowId}', 'Main\CartController@delete')->name('cart.delete');
Route::get('/carts/add/{id}', 'Main\CartController@add')->name('cart.add');
Route::get('/product/{id}', 'Main\MainController@single')->name('product.single');

//auth routes
Route::get('/login', 'Auth\LoginController@index')->name('auth.index');
Route::post('/auth/login', 'Auth\LoginController@login')->name('auth.login');
Route::get('/register', 'Auth\LoginController@register')->name('auth.register');
Route::post('/auth/register', 'Auth\LoginController@doRegister')->name('auth.doRegister');

//user panel routes
Route::get('/user/index', 'User\PanelController@orders')->name('user.orders');
Route::get('/user/order/{id}', 'User\PanelController@showOrderDetails')->name('user.orders.details');
Route::get('/user/profile', 'User\PanelController@profile')->name('user.profile');
Route::post('/user/edit/profile', 'User\PanelController@editProfile')->name('user.edit.profile');
Route::get('/checkout/index', 'Main\CheckoutController@getCheckout')->name('checkout.index');
Route::post('/checkout/store', 'Main\CheckoutController@storeOrderDetails')->name('checkout.store');

//dashboard routes
Route::get('/dashboard/index', 'Dashboard\DashboardController@index')->name('dashboard.index');
Route::get('/dashboard/users/index', 'Dashboard\UserController@index')->name('dashboard.users.index');

Route::get('/dashboard/orders/index', 'Dashboard\OrderController@index')->name('dashboard.orders.index');
Route::get('/dashboard/orders/show/{id}', 'Dashboard\OrderController@show')->name('dashboard.orders.show');
Route::get('/dashboard/orders/delete/{id}', 'Dashboard\OrderController@delete')->name('dashboard.orders.delete');

Route::get('/dashboard/categories/index', 'Dashboard\CategoryController@index')->name('dashboard.categories.index');
Route::post('/dashboard/categories/store', 'Dashboard\CategoryController@store')->name('dashboard.categories.store');
Route::get('/dashboard/categories/delete/{id}', 'Dashboard\CategoryController@delete')->name('dashboard.categories.delete');


Route::get('/dashboard/products/index', 'Dashboard\ProductController@index')->name('dashboard.products.index');
Route::get('/dashboard/products/create', 'Dashboard\ProductController@create')->name('dashboard.products.create');
Route::post('/dashboard/products/store', 'Dashboard\ProductController@store')->name('dashboard.products.store');
Route::get('/dashboard/products/edit/{id}', 'Dashboard\ProductController@edit')->name('dashboard.products.edit');
Route::post('/dashboard/products/update/{id}', 'Dashboard\ProductController@update')->name('dashboard.products.update');
Route::get('/dashboard/products/delete/{id}', 'Dashboard\ProductController@delete')->name('dashboard.products.delete');
