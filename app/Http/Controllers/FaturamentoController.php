<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FaturamentoController extends Controller
{
    public function index(){
        return view('pages.fat.dashboard');
    }

    public function getFaturamento(Request $request){
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client();
        $client->setDefaultOption('verify', 'C:\Users\paulo\Documents\dev\app\resources\cert\cacert.pem');
        $res = $client->get(
            env('API_URL').'/getFaturamento?datainicial='.$datainicial.'&datafinal='.$datafinal
        );
        return response($res->getBody());
    }
}
