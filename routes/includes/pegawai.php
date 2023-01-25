<?php

use Illuminate\Support\Facades\Route;

Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/{id}', 'PegawaiController@show');
Route::post('/pegawai', 'PegawaiController@store');
Route::post('/pegawai/{id}', 'PegawaiController@update');
Route::delete('/pegawai/{id}', 'PegawaiController@destroy');
