<?php

Auth::routes();

Route::get('/tango','Auth\AdminLoginController@show')->name('admin.login');
Route::post('/tango','Auth\AdminLoginController@login');
Route::get('/tango/dashboard','AdminController@index');
Route::get('/tango/logout','Auth\AdminLoginController@logout');

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

Route::get('/tango/licenses', 'tango\LicenseController@index');
Route::get('/tango/licenses/detailed', [ 'middleware' => 'ajax', 'uses' => 'tango\LicenseController@getDetailedView' ]);
Route::get('/tango/licenses/add', 'tango\LicenseController@create');
Route::post('/tango/licenses/add', 'tango\LicenseController@store');
Route::delete('/tango/licenses/delete/{license}', 'tango\LicenseController@destroy');

Route::get('/tango/users', 'tango\UserController@index');
Route::get('/tango/users/{user}', 'tango\UserController@show');
Route::delete('/tango/users/delete/{user}', 'tango\UserController@delete');

/* ---------------------------- SITE ---------------------------- */

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/register/emailExists', 'Auth\RegisterController@emailExists');
Route::get('/my-account', 'site\MyAccountController@index');
Route::get('/my-account/logout', 'Auth\LoginController@userLogout');

Route::get('/', 'site\HomepageController@index' );
Route::get('/sautocomplete/{id}', 'site\SearchMatchController@autocomplete');
Route::get('/search', 'site\SearchMatchController@show');