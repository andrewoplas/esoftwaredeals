<?php

Route::get('/tango', [ 'as' => 'login', 'uses' => 'SessionController@create']);
Route::post('/tango', 'SessionController@store');
Route::get('/tango/logout', 'SessionController@destroy');

Route::get('/products', 'ProductsController@index');
Route::get('/products/edit/{product}', 'ProductsController@show');
Route::get('/products/add', 'ProductsController@show');
Route::post('/products/edit/{product}', 'ProductsController@update');
Route::post('/products/add', 'ProductsController@store');

Route::get('/categories', 'CategoryController@index');
Route::post('/categories', 'CategoryController@store');

Route::get('/tango/licenses', 'LicenseController@index');
Route::get('/tango/licenses/add', 'LicenseController@create');
Route::post('/tango/licenses/add', 'LicenseController@store');
Route::post('/tango/licenses/delete', 'LicenseController@destroy');