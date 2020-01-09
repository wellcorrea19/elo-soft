<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultLucBruController extends Controller
{
    public function index(){
        return view('pages.op.res-lucbru');
    }

    public function getPedidoLucroBruTipoCarga(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', env('SSL'));
        $res = $client->get(
            '/getPedidoLucroBruTCarga?datainicial='.$datainicial.'&datafinal='.$datafinal ,
            Array('headers' => $headers)
        );
        return response($res->getBody());
    }
    // 

}
