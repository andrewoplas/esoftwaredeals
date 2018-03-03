<?php

Auth::routes();

Route::get('/tango','Auth\AdminLoginController@show');
Route::post('/tango','Auth\AdminLoginController@show');
Route::get('/tango/dashboard','Auth\AdminLoginController@show');
Route::get('/tango/logout','Auth\AdminLoginController@show');

Route::get('/tango/products', 'tango\ProductController@index');
Route::get('/tango/products/edit/{product}', 'tango\ProductController@show');
Route::get('/tango/products/add', 'tango\ProductController@show');
Route::delete('/tango/products/delete/{product}', 'tango\ProductController@destroy');
Route::post('/tango/products/edit/{product}', 'tango\ProductController@update');
Route::post('/tango/products/add', 'tango\ProductController@store');

Route::get('/tango/categories', 'tango\CategoryController@index');
Route::get('/tango/categories/edit/{category}', 'tango\CategoryController@show');
Route::get('/tango/categories/add', 'tango\CategoryController@show');
Route::post('/tango/categories/edit/{category}', 'tango\CategoryController@update');
Route::post('/tango/categories/add', 'tango\CategoryController@store');
Route::patch('tango/categories', 'tango\CategoryController@update');
Route::delete('/tango/categories/delete/{category}', 'tango\CategoryController@destroy');

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

Route::get('/tango/users', 'tango\UserController@index');
Route::get('/tango/users/{user}', 'tango\UserController@show');
Route::delete('/tango/users/delete/{user}', 'tango\UserController@delete');
