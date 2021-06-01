<?php

use BulveyzRouter\Route;


Route::setNamespace('App\Controllers');

Route::get('/home', function() {
  echo "Home";
});


Route::any('/user/{id}', function($param) {
  echo "User" . $param->id;
});


Route::get('/dashboard/index', 'Dashboard\DashboardController@index');

// Route::get('/create/post/{id}', 'Dashboard\DashboardController@store');