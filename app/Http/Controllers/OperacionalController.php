<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperacionalController extends Controller
{
    public function index(){
        return view('pages.op.stts-pedido');
    }

    public function getPedidoLucroBruTipoCarga(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', env('SSL'));
        $res = $client->get(
            '/getPedidoLucroBruTipoCarga?datainicial='.$datainicial.'&datafinal='.$datafinal ,
            Array('headers' => $headers)
        );
        return response($res->getBody());
    }
    // 

    public function getPedidoLucroLiqTipoCarga(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', env('SSL'));
        $res = $client->get(
            '/getPedidoLucroLiqTipoCarga?datainicial='.$datainicial.'&datafinal='.$datafinal ,
            Array('headers' => $headers)
        );
        return response($res->getBody());
    }
    // 

    public function getPedidoQtdeModalidade(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', env('SSL'));
        $res = $client->get(
            '/getPedidoQtdeModalidade?datainicial='.$datainicial.'&datafinal='.$datafinal ,
            Array('headers' => $headers)
        );
        return response($res->getBody());
    }
    // 

    public function getPedidoQtdeTipoFrete(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', env('SSL'));
        $res = $client->get(
            '/getPedidoQtdeTipoFrete?datainicial='.$datainicial.'&datafinal='.$datafinal ,
            Array('headers' => $headers)
        );
        return response($res->getBody());
    }
    // 

    




}
