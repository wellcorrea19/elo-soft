<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultQuantController extends Controller
{
    public function index(){
        return view('pages.op.res-quant');
    }

    public function getPedidoQtdeModalidade(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', env('SSL'));
        $res = $client->get(
            '/getPedidoQtdeMod?datainicial='.$datainicial.'&datafinal='.$datafinal ,
            Array('headers' => $headers)
        );
        return response($res->getBody());
    }
    // 

    public function getPedidoQtdeTFrete(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', env('SSL'));
        $res = $client->get(
            '/getPedidoQtdeTFrete?datainicial='.$datainicial.'&datafinal='.$datafinal ,
            Array('headers' => $headers)
        );
        return response($res->getBody());
    }
    // 

    public function getPedidoQtdeTCarga(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', env('SSL'));
        $res = $client->get(
            '/getPedidoQtdeTCarga?datainicial='.$datainicial.'&datafinal='.$datafinal ,
            Array('headers' => $headers)
        );
        return response($res->getBody());
    }
    // 

}
