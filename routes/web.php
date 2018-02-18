<?php

Route::get('/tango', [ 'as' => 'login', 'uses' => 'SessionController@create']);
Route::post('/tango', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');

Route::get('/products', 'ProductsController@index');
Route::get('/products/edit/{product}', 'ProductsController@show');
Route::get('/products/add', 'ProductsController@show');
Route::post('/products/edit/{product}', 'ProductsController@update');
Route::post('/products/add', 'ProductsController@store');

Route::get('/categories', 'CategoryController@index');
Route::post('/categories', 'CategoryController@store');
