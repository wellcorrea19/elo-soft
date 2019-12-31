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

    Route::prefix('operacional')->group(function () {
        Route::get('/', 'OperacionalController@index')->name('operacional');

        Route::prefix('get')->group(function () {
            Route::get('pedidolucrobrutipocarga', 'OperacionalController@getPedidoLucroBruTipoCarga')->name('getfatfiscal');

            Route::get('pedidolucroliqtipocarga', 'OperacionalController@getPedidoLucroLiqTipoCarga')->name('getfatgerencial');

            Route::get('pedidoqtdemodalidade', 'OperacionalController@getPedidoQtdeModalidade')->name('getFatGerencialCliente');

            Route::get('pedidoqtdetipofrete', 'OperacionalController@getPedidoQtdeTipoFrete')->name('getfaturamento');
        });
    });

});

//Route::get('/login', 'Auth\Rest\LoginController@index')->name('login');

Route::post('/loged', 'Auth\Rest\LoginController@login')->name('loged');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
