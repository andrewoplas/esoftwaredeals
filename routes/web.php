<?php

Route::get('/tango', 'SessionController@create');
Route::post('/tango', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');

Route::get('/tango', function () {
    return view('login');
});

Route::get('/products', 'ProductsController@index');
Route::get('/products/edit/{product}', 'ProductsController@show');
Route::get('/products/add', 'ProductsController@show');
Route::post('/products/edit/{product}', 'ProductsController@store');
Route::post('/products/add', 'ProductsController@store');

Route::get('/categories', 'CategoryController@index');
Route::post('/categories', 'CategoryController@store');

