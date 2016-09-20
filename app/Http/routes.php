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
Route::get('/dashboard/product/add', 'Dashboard\DashboardController@addProductPage');
Route::post('/dashboard/product/add', 'Dashboard\DashboardController@addProduct');
Route::get('/dashboard/product/edit/{id}', 'Dashboard\DashboardController@editProductPage');
Route::post('/dashboard/product/edit/{id}', 'Dashboard\DashboardController@editProduct');
Route::post('/dashboard/product/delete', 'Dashboard\DashboardController@deleteProduct'); // ajax

///dashboard products end here

Route::get('/api/products/get/all', 'Api\ProductsController@getAllProducts');
Route::get('/api/products/get/top10', 'Api\ProductsController@getTop10');
Route::get('/api/products/test', 'Api\ProductsController@test');

// Front Products
Route::get('/catalog', 'Products\ProductsController@catalog');
Route::get('/category/{name}', 'Products\ProductsController@category');
Route::get('/product/{name}', 'Products\ProductsController@product');
// Front Products end