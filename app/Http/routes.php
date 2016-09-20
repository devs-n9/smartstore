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
Route::get('/dashboard/orders', 'Dashboard\OrdersController@orders');
Route::get('/dashboard/orders/edit/{id}', 'Dashboard\OrdersController@edit');
Route::post('/dashboard/orders/edit/{id}', 'Dashboard\OrdersController@update');

