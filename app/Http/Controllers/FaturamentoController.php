<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use function Psy\debug;

class FaturamentoController extends Controller
{
    public function index(){
        return view('pages.fat.dashboard');
    }

    public function getFaturamento(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', env('SSL'));
        $res = $client->get(
            env('API_URL').'/getFaturamento?datainicial='.$datainicial.'&datafinal='.$datafinal
        );
        return response($res->getBody());
    }

    public function getFatGerencial(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', env('SSL'));
        $res = $client->get(
            '/getFatGerencial?datainicial='.$datainicial.'&datafinal='.$datafinal ,
            Array('headers' => $headers)
        );
        return response($res->getBody());
    }

    public function getFatGerencialCliente(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', env('SSL'));
        $res = $client->get(
            '/getFatGerencialCliente?datainicial='.$datainicial.'&datafinal='.$datafinal ,
            Array('headers' => $headers)
        );
        return response($res->getBody());
    }
}
