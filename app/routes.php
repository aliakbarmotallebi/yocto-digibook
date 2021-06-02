<?php

use BulveyzRouter\Route;

Route::setNamespace('App\Controllers');

Route::get('/', 'Main\MainController@index')->name('main.index');

Route::get('/login', 'Auth\LoginController@index')->name('auth.index');
Route::post('/auth/login', 'Auth\LoginController@login')->name('auth.login');
//


//dashboard routes
Route::get('/dashboard/index', 'Dashboard\DashboardController@index')->name('dashboard.index');
