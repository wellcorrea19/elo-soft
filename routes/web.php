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

Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/faturamento', 'FaturamentoController@index')->name('faturamento');

Route::get('/getfaturamento', 'FaturamentoController@getfaturamento')->name('getfaturamento');

Route::get('/getfatgerencial', 'FaturamentoController@getFatGerencial')->name('getFatGerencial');

Route::get('/operacional', 'OperacionalController@index')->name('operacional');

Route::get('/login', 'Auth\Rest\LoginController@index')->name('login');

Route::post('/loged', 'Auth\Rest\LoginController@login')->name('loged');

//Route::post('/login', 'Auth\Rest\LoginController@token')->name('apilogin');


