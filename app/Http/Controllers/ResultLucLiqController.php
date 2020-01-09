<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultLucLiqController extends Controller
{
    public function index(){
        return view('pages.op.res-lucliq');
    }

    public function getPedidoLucroLiqTipoCarga(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', env('SSL'));
        $res = $client->get(
            '/getPedidoLucroLiqTCarga?datainicial='.$datainicial.'&datafinal='.$datafinal ,
            Array('headers' => $headers)
        );
        return response($res->getBody());
    }
    // 

}