<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'BaseController@showLogin');
Route::post('/login', array('uses' => 'BaseController@doLogin'));
Route::get('/logout', array('uses' => 'BaseController@doLogout'));

Route::get('/dashboard', 'DashboardController@index');
/*
ORDERS
*/
Route::get('/orders', 'OrderController@index');
Route::get('/order/{id?}', 'OrderController@show');
//save new order
Route::get('/order/new', 'OrderController@create');
Route::put('/order/new', 'OrderController@store');
//update exisitng order
Route::get('/order/{id?}/update', 'OrderController@edit');
Route::put('/order/{id?}/update', 'OrderController@update');

/*
CUSTOMERS
*/
Route::get('/customers', 'CustomerController@index');
Route::get('/customer/{id?}', 'CustomerController@show');
//new customer
Route::get('/customer/new', 'CustomerController@create');
Route::put('/customer/new', 'CustomerController@store');
//update exisitng customer
Route::get('/customer/{id?}/update', 'CustomerController@edit');
Route::put('/customer/{id?}/update', 'CustomerController@update');

/*
PRODUCTS
*/
Route::get('/products', 'ProductController@index');
Route::get('/product/{id?}', 'ProductController@show');
