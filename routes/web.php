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

            Route::get('gerencial', 'FaturamentoController@getFatGerencial')->name('getfatgerencial');

            Route::get('gerencialcliente', 'FaturamentoController@getFatGerencialCliente')->name('getFatGerencialCliente');
        });
    });

    Route::prefix('fat-comp')->group(function () {

        Route::get('/', 'FatComparativoController@index')->name('fat-comp');

        Route::prefix('get')->group(function () {
            Route::get('compfatfiscal', 'FaturamentoController@getCompFatFiscal')->name('getCompFatFiscal');

            Route::get('compfatgerencial', 'FaturamentoController@getCompFatGerencial')->name('getCompFatGerencial');

        });
    });

    Route::prefix('operacional')->group(function () {
        Route::prefix('get')->group(function () {
            Route::get('pedidoqtdemodalidade', 'OperacionalController@getPedidoQtdeModalidade')->name('getPedidoQtdeModalidade');

            Route::get('pedidoqtdetfrete', 'OperacionalController@getPedidoQtdeTFrete')->name('getPedidoQtdeTFrete');

            Route::get('pedidoqtdetcarga', 'OperacionalController@getPedidoQtdeTCarga')->name('getPedidoQtdeTCarga');

            Route::get('pedidoqtderota', 'OperacionalController@getPedidoQtdeRota')->name('getPedidoQtdeRota');

            Route::get('pedidolucrobrutcarga', 'OperacionalController@getPedidoLucroBruTCarga')->name('getPedidoLucroBruTCarga');

            Route::get('pedidolucrobrutfrete', 'OperacionalController@getPedidoLucroBruTFrete')->name('getPedidoLucroBruTFrete');

            Route::get('pedidolucroliqtcarga', 'OperacionalController@getPedidoLucroLiqTCarga')->name('getPedidoLucroLiqTCarga');

            Route::get('pedidolucroliqtfrete', 'OperacionalController@getPedidoLucroLiqTFrete')->name('getPedidoLucroLiqTFrete');

            Route::get('pedidolucroliqrota', 'OperacionalController@getPedidoLucroLiqRota')->name('getPedidoLucroLiqRota');
        });

        Route::prefix('resultquant')->group(function () {
            Route::get('/', 'OperacionalController@resultquant')->name('resultquant');


        });

        Route::prefix('resultlucbru')->group(function () {
            Route::get('/', 'OperacionalController@resultlucbru')->name('resultlucbru');


        });

        Route::prefix('resultlucliq')->group(function () {
            Route::get('/', 'OperacionalController@resultlucliq')->name('resultlucliq');

        });
    });

});

//Route::get('/login', 'Auth\Rest\LoginController@index')->name('login');

Route::post('/loged', 'Auth\Rest\LoginController@login')->name('loged');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
