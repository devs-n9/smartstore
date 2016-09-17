<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'DefaultController@index');

Route::get('/dashboard', 'Dashboard\DashboardController@index');

///dashboard products begin here

Route::get('/dashboard/products/all', 'Dashboard\DashboardController@showAllProducts');
Route::get('/dashboard/product/edit/{id}', 'Dashboard\DashboardController@editProduct');

///dashboard products end here

Route::get('/api/products/get/all', 'Api\ProductsController@getAllProducts');
Route::get('/api/products/get/top10', 'Api\ProductsController@getTop10');
Route::get('/api/products/test', 'Api\ProductsController@test');