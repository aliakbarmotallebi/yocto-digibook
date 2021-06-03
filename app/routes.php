<?php

use BulveyzRouter\Route;

Route::setNamespace('App\Controllers');

Route::get('/', 'Main\MainController@index')->name('main.index');
Route::get('/logout', 'Main\MainController@logout')->name('logout');
Route::get('/category/{id}', 'Main\MainController@catgeory')->name('main.category');


Route::get('/login', 'Auth\LoginController@index')->name('auth.index');
Route::post('/auth/login', 'Auth\LoginController@login')->name('auth.login');
//

Route::get('/user/index', 'User\PanelController@orders')->name('user.orders');
Route::get('/user/profile', 'User\PanelController@profile')->name('user.profile');
Route::post('/user/edit/profile', 'User\PanelController@editProfile')->name('user.edit.profile');

//dashboard routes
Route::get('/dashboard/index', 'Dashboard\DashboardController@index')->name('dashboard.index');
