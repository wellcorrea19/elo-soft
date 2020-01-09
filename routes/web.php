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




Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::prefix('faturamento')->group(function () {

        Route::get('/', 'FaturamentoController@index')->name('faturamento');

        Route::prefix('get')->group(function () {
            Route::get('fiscal', 'FaturamentoController@getFatFiscal')->name('getfatfiscal');

            Route::get('faturamento', 'FaturamentoController@getfaturamento')->name('getfaturamento');

            Route::get('gerencial', 'FaturamentoController@getFatGerencial')->name('getfatgerencial');

            Route::get('gerencialcliente', 'FaturamentoController@getFatGerencialCliente')->name('getFatGerencialCliente');
        });
    });

    Route::prefix('resultquant')->group(function () {
        Route::get('/', 'ResultQuantController@index')->name('resultquant');

        Route::prefix('get')->group(function () {
            Route::get('pedidoqtdemodalidade', 'OperacionalController@getPedidoQtdeModalidade')->name('getPedidoQtdeModalidade');

            Route::get('pedidoqtdetfrete', 'OperacionalController@getPedidoQtdeModalidade')->name('getPedidoQtdeTFrete');

            Route::get('pedidoqtdetcarga', 'OperacionalController@getPedidoQtdeModalidade')->name('getPedidoQtdeTCarga');
        });
    });

    Route::prefix('resultlucbru')->group(function () {
        Route::get('/', 'ResultLucBruController@index')->name('resultlucbru');

        Route::prefix('get')->group(function () {
            Route::get('pedidolucrobrutipocarga', 'OperacionalController@getPedidoLucroBruTipoCarga')->name('getfatfiscal');
        });
    });

    Route::prefix('resultlucliq')->group(function () {
        Route::get('/', 'ResultLucLiqController@index')->name('resultlucliq');

        Route::prefix('get')->group(function () {
            Route::get('pedidolucroliqtipocarga', 'OperacionalController@getPedidoLucroLiqTipoCarga')->name('getfatgerencial');
        });
    });

});

//Route::get('/login', 'Auth\Rest\LoginController@index')->name('login');

Route::post('/loged', 'Auth\Rest\LoginController@login')->name('loged');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
