<?php

Route::get('/tango', 'SessionController@show');
Route::post('/tango', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');