<?php

Route::get('/tango', [ 'as' => 'login', 'uses' => 'SessionController@create']);
Route::post('/tango', 'SessionController@store');
Route::get('/tango/logout', 'SessionController@destroy');

Route::get('/tango/products', 'ProductController@index');
Route::get('/tango/products/edit/{product}', 'ProductController@show');
Route::get('/tango/products/add', 'ProductController@show');
Route::delete('/tango/delete/{product}', 'ProductController@destroy');
Route::post('/tango/products/edit/{product}', 'ProductController@update');
Route::post('/tango/products/add', 'ProductController@store');

Route::get('/tango/categories', 'CategoryController@index');
Route::post('/tango/categories', 'CategoryController@store');

Route::get('/tango/licenses', 'LicenseController@index');
Route::get('/tango/licenses/add', 'LicenseController@create');
Route::post('/tango/licenses/add', 'LicenseController@store');
Route::post('/tango/licenses/delete', 'LicenseController@destroy');

Route::get('/tango/coupons', 'CouponController@index');
Route::get('/tango/coupons/add', 'CouponController@show');
Route::get('/tango/coupons/edit/{coupon}', 'CouponController@show');
Route::post('/tango/coupons/add', 'CouponController@store');
