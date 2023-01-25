<?php

use Illuminate\Support\Facades\Route;

Route::get('/kontrak', 'KontrakController@index');
Route::get('/kontrak/{id}', 'KontrakController@show');
Route::post('/kontrak', 'KontrakController@store');
Route::post('/kontrak/{id}', 'KontrakController@update');
Route::delete('/kontrak/{id}', 'KontrakController@destroy');
