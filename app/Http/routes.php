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

Route::group(['middleware' => 'web'], function() {

  // Dashboard
  Route::group(['middleware' => 'auth.dashboard'], function () {
    Route::group(['middleware' => ['client']], function () {
      Route::get('/dashboard', 'Dashboard\DashboardController@index');
      Route::get('/dashboard/orders', 'Dashboard\OrdersController@orders');
      Route::get('/dashboard/orders/edit/{id}', 'Dashboard\OrdersController@edit');
      Route::post('/dashboard/orders/edit/{id}', 'Dashboard\OrdersController@update');
    });
  });
  Route::group(['middleware' => 'guest'], function () {
    Route::get('/dashboard/login', 'Auth\AuthController@getDashboardLogin');
    Route::post('/dashboard/login', 'Auth\AuthController@userDashboardLogin');
  });
  // End dashboard

  // Cart routes begin
  Route::get('/cart', 'Cart\CartController@cart');
  Route::post('/cart/addToCart', 'Cart\CartController@addToCart');
  Route::get('/checkout', 'Cart\CartController@checkout');
  // Cart routes end

  // Dashboard products begin here
  Route::get('/dashboard/products/all', 'Dashboard\ProductsController@showAllProducts');
  Route::get('/dashboard/product/add', 'Dashboard\ProductsController@addProduct');
  Route::post('/dashboard/product/add', 'Dashboard\ProductsController@addProduct');
  Route::get('/dashboard/product/edit/{id}', 'Dashboard\ProductsController@editProduct');
  Route::post('/dashboard/product/edit/{id}', 'Dashboard\ProductsController@editProduct');
  Route::post('/dashboard/product/delete', 'Dashboard\ProductsController@deleteProduct'); // ajax
  Route::post('/dashboard/brand/delete', 'Dashboard\ProductsController@deleteBrand'); // ajax
	
  //notify
  Route::get('/dashboard/notify', 'Dashboard\DashboardController@notify');
	
  // Dashboard brands begin here
  Route::get('/dashboard/brands/all', 'Dashboard\ProductsController@showAllBrands');
  Route::get('/dashboard/brands/add', 'Dashboard\ProductsController@addBrand');
  Route::post('/dashboard/brands/add', 'Dashboard\ProductsController@addBrand');
  // Dashboard brands end here

  Route::get('/api/products/get/all', 'Api\ProductsController@getAllProducts');
  Route::get('/api/products/get/top10', 'Api\ProductsController@getTop10');
  Route::get('/api/products/test', 'Api\ProductsController@test');

  // Front Products
  Route::get('/catalog', 'Products\ProductsController@catalog');
  Route::get('/category/{name}', 'Products\ProductsController@category');
  Route::get('/product/{name}', 'Products\ProductsController@product');
  Route::post('/product/{name}', 'Products\ProductsController@product');
  // Front Products end

  // Auth
  Route::auth();
  Route::group(['middleware' => 'guest'], function () {
    // Registration
    Route::get('/register', 'Auth\AuthController@getRegister');
    Route::post('/register', 'Auth\AuthController@userRegister');
    // Activate user
    Route::get('/activate','Auth\AuthController@activate');
    // Login
    Route::get('/login','Auth\AuthController@getLogin');
    Route::post('/login','Auth\AuthController@userLogin');
    // Reset password
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
  });
  Route::group(['middleware' => 'auth'], function () {
    // Profile
    Route::get('/profile', 'Auth\ProfileController@getProfile');
    Route::post('/profile', 'Auth\ProfileController@updateProfile');
  });
  // Auth end

});


