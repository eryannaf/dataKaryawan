<?php

use Illuminate\Support\Facades\Route;

Route::get('/pegawai_api', 'PegawaiApiController@index');
Route::get('/pegawai_api/{id}', 'PegawaiApiController@show');
Route::post('/pegawai_api', 'PegawaiApiController@store');
Route::post('/pegawai_api/{id}', 'PegawaiApiController@update');
Route::delete('/pegawai_api/{id}', 'PegawaiApiController@destroy');
