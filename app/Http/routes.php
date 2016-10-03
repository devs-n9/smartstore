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
App::setLocale('ru');
Route::get('/', 'DefaultController@index');

Route::get('/dashboard', 'Dashboard\DashboardController@index');
Route::get('/dashboard/orders', 'Dashboard\OrdersController@orders');
Route::get('/dashboard/orders/edit/{id}', 'Dashboard\OrdersController@edit');
Route::post('/dashboard/orders/edit/{id}', 'Dashboard\OrdersController@update');

// Cart routes begin

Route::get('/cart', 'Cart\CartController@cart');
Route::post('/cart/addToCart', 'Cart\CartController@addToCart');
Route::get('/checkout', 'Cart\CartController@checkout');

// Cart routes end

///dashboard products begin here

Route::get('/dashboard/products/all', 'Dashboard\ProductsController@showAllProducts');
Route::get('/dashboard/product/add', 'Dashboard\ProductsController@addProduct');
Route::post('/dashboard/product/add', 'Dashboard\ProductsController@addProduct');
Route::get('/dashboard/product/edit/{id}', 'Dashboard\ProductsController@editProduct');
Route::post('/dashboard/product/edit/{id}', 'Dashboard\ProductsController@editProduct');
Route::post('/dashboard/product/delete', 'Dashboard\ProductsController@deleteProduct'); // ajax
Route::post('/dashboard/brand/delete', 'Dashboard\ProductsController@deleteBrand'); // ajax

///dashboard products end here

//dashboard categories begin here
Route::get('/dashboard/categories/all', 'Dashboard\CategoriesController@showAllCategories');
Route::get('/dashboard/category/add', 'Dashboard\CategoriesController@addCategory');
Route::post('/dashboard/category/add', 'Dashboard\CategoriesController@addCategory');
Route::get('/dashboard/category/edit/{id}', 'Dashboard\CategoriesController@editCategory');
Route::post('/dashboard/category/edit/{id}', 'Dashboard\CategoriesController@updateCategory');
Route::get('/dashboard/category/delete/{id}', 'Dashboard\CategoriesController@deleteCategory');
//Route::post('/dashboard/category/delete/{id}', 'Dashboard\CategoriesController@deleteCategory');

//dashboard brands begin here
Route::get('/dashboard/brands/all', 'Dashboard\ProductsController@showAllBrands');
Route::get('/dashboard/brands/add', 'Dashboard\ProductsController@addBrand');
Route::post('/dashboard/brands/add', 'Dashboard\ProductsController@addBrand');

//dashboard brands end here

Route::get('/api/products/get/all', 'Api\ProductsController@getAllProducts');
Route::get('/api/products/get/top10', 'Api\ProductsController@getTop10');
Route::get('/api/products/test', 'Api\ProductsController@test');

// Front Products
Route::get('/catalog', 'Products\ProductsController@catalog');
Route::get('/category/{name}', 'Products\ProductsController@category');
Route::get('/product/{name}', 'Products\ProductsController@product');
Route::post('/product/{name}', 'Products\ProductsController@product');
// Front Products end
