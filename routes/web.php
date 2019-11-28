<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('welcome');
});

Route::get( '/previsao',         'ControlPrevisao@index') ;
Route::get( '/predicao',      'ControlPredicao@index') ;
Route::get( '/iot',                'ControlIot@index') ;
Route::post( '/iotEst',           'ControlIot@store') ;
Route::get( '/engenharia',  'ControlEngenharia@index') ;
                        
