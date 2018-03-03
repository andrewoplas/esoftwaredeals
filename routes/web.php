<?php

Route::get('/tango/products', 'tango\ProductController@index');
Route::get('/tango/products/edit/{product}', 'tango\ProductController@show');
Route::get('/tango/products/add', 'tango\ProductController@show');
Route::delete('/tango/products/delete/{product}', 'tango\ProductController@destroy');
Route::post('/tango/products/edit/{product}', 'tango\ProductController@update');
Route::post('/tango/products/add', 'tango\ProductController@store');

Route::get('/tango/categories', 'CategoryController@index');
Route::get('/tango/categories/edit/{category}', 'CategoryController@show');
Route::get('/tango/categories/add', 'CategoryController@show');
Route::post('/tango/categories/edit/{category}', 'CategoryController@update');
Route::post('/tango/categories/add', 'CategoryController@store');
Route::patch('tango/categories', 'CategoryController@update');
Route::delete('/tango/categories/delete/{category}', 'CategoryController@destroy');
//Route::delete('tango/categories', 'CategoryController@delete');

Route::get('/tango/coupons', 'tango\CouponController@index');
Route::get('/tango/coupons/edit/{coupon}', 'tango\CouponController@show');
Route::get('/tango/coupons/add', 'tango\CouponController@show');
Route::delete('/tango/coupons/delete/{coupon}', 'tango\CouponController@destroy');
Route::post('/tango/coupons/edit/{coupon}', 'tango\CouponController@update');
Route::post('/tango/coupons/add', 'tango\CouponController@store');

Route::get('/tango/licenses', 'LicenseController@index');
Route::get('/tango/licenses/detailed', [ 'middleware' => 'ajax', 'uses' => 'LicenseController@getDetailedView' ]);
Route::get('/tango/licenses/add', 'LicenseController@create');
Route::post('/tango/licenses/add', 'LicenseController@store');
Route::delete('/tango/licenses/delete/{license}', 'LicenseController@destroy');

// ----------------- Front end ----------------------------

Route::get('/sautocomplete/{id}', 'SearchMatchController@autocomplete');
Route::get('/search', 'SearchMatchController@show');
Route::get('/', 'FrontEnd\HomepageController@index' );

Route::get('/tango/users', 'UserController@index');
Route::get('/tango/users/{user}', 'UserController@show');
Route::delete('/tango/users/delete/{user}', 'UserController@delete');
