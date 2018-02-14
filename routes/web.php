<?php

Route::get('/tango', 'SessionController@create');
Route::post('/tango', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');