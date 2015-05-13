<?php

$path = storage_path().'/logs/query.log';

App::before(function($request) use($path) {
    $start = PHP_EOL.'=| '.$request->method().' '.$request->path().' |='.PHP_EOL;
  File::append($path, $start);
});

Event::listen('illuminate.query', function($sql, $bindings, $time) use($path) {
    // Uncomment this if you want to include bindings to queries
    //$sql = str_replace(array('%', '?'), array('%%', '%s'), $sql);
    //$sql = vsprintf($sql, $bindings);
    $time_now = (new DateTime)->format('Y-m-d H:i:s');;
    $log = $time_now.' | '.$sql.' | '.$time.'ms'.PHP_EOL;
  File::append($path, $log);
});

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
Route::post('/order/new/form', array('before' => 'auth', 'uses' => 'OrderController@newForm'));
//Route::get('/order/new', 'OrderController@create');
Route::put('/order/new', array('before' => 'auth', 'uses' => 'OrderController@store'));
//view orders
Route::get('/orders', array('before' => 'auth', 'uses' => 'OrderController@index'));
Route::get('/orders/{type?}', array('before' => 'auth', 'uses' => 'OrderController@indexByType'));
//Route::get('/orders', 'OrderController@index');
//Route::get('/order/{id?}', 'OrderController@show');
Route::get('/order/{id?}', array('before' => 'auth', 'uses' => 'OrderController@show'));
//update exisitng order
// Route::get('/order/{id?}/update', 'OrderController@edit');
// Route::put('/order/{id?}/update', 'OrderController@update');
Route::post('/order/postStatus', 'OrderController@postOrderStatus');
Route::post('/order/updateStatus', 'OrderController@postUpdateStatus');

Route::post('/orderform/getJsonDescription', 'OrderFormController@getJsonDescription');

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

Route::post('/product/brandsInCategory', 'ProductController@getBrandsByCategroy');
Route::post('/product/getProductsByBrandAndCategory', 'ProductController@getProductsByBrandAndCategory');
