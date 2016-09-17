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
Route::get('/', 'NewsController@index');
Route::get('/news/edit', "NewsController@lists");
Route::get('/news/{title}', "NewsController@index");
Route::auth();


Route::get('/dashboard', 'Dashboard\DashboardController@index');
Route::get('/dashboard/news', 'Dashboard\NewsController@index');
Route::get('/dashboard/news/post/create', 'Dashboard\NewsController@create');
Route::post('/dashboard/news/post/create', 'Dashboard\NewsController@insert');

Route::get('/dashboard/news/post/edit/{id}', 'Dashboard\NewsController@edit');
Route::post('/dashboard/news/post/edit/{id}', 'Dashboard\NewsController@update');

Route::get('/dashboard/news/post/delete/{title}', 'Dashboard\NewsController@delete');




