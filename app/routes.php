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

//save new order

Route::get('/order/new', array('before' => 'auth', 'uses' => 'OrderController@create'));
Route::post('/order/new/form', 'OrderController@newForm');
//Route::get('/order/new', 'OrderController@create');
Route::put('/order/new', 'OrderController@store');
//view orders
Route::get('/orders', array('before' => 'auth', 'uses' => 'OrderController@index'));
//Route::get('/orders', 'OrderController@index');
//Route::get('/order/{id?}', 'OrderController@show');
Route::get('/order/{id?}', array('before' => 'auth', 'uses' => 'OrderController@show'));
//update exisitng order
// Route::get('/order/{id?}/update', 'OrderController@edit');
// Route::put('/order/{id?}/update', 'OrderController@update');
Route::post('/order/postStatus', 'OrderController@postOrderStatus');
/*
CUSTOMERS
*/

//new customer
Route::get('/customer/new', 'CustomerController@create');
Route::put('/customer/new', 'CustomerController@store');

// find a customer by email
Route::post('/customer/lookup', 'CustomerController@customerLookUp');

//view customer
Route::get('/customers', 'CustomerController@index');
Route::get('/customer/{id?}', array('before' => 'auth', 'uses' => 'CustomerController@show'));
//update exisitng customer
Route::get('/customer/edit/{id?}/', 'CustomerController@edit');
Route::put('/customer/edit/{id?}', 'CustomerController@update');

/*
PRODUCTS
*/
Route::get('/products', 'ProductController@index');
Route::get('/product/{id?}', 'ProductController@show');
