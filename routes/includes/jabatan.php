<?php

use Illuminate\Support\Facades\Route;

Route::get('/jabatan', 'JabatanController@index');
Route::get('/jabatan/{id}', 'JabatanController@show');
Route::post('/jabatan', 'JabatanController@store');
Route::post('/jabatan/{id}', 'JabatanController@update');
Route::delete('/jabatan/{id}', 'JabatanController@destroy');
