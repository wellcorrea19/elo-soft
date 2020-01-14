<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use function Psy\debug;

class FaturamentoController extends Controller
{
    /**
     * @var \Illuminate\Session\SessionManager|\Illuminate\Session\Store
     */
    protected $token;

    public function __construct()
    {
        $this->token = session('token');
    }

    public function index(){
        return view('pages.fat.dashboard');
    }

    public function getFatFiscal(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', base_path() . env('SSL'));
        $res = $client->get(
            '/getFatFiscal?datainicial='.$datainicial.'&datafinal='.$datafinal ,
            Array('headers' => $headers)
        );
        return response($res->getBody());
    }

    public function getFatGerencial(Request $request){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $datainicial = $request->input('datainicial');
        $datafinal =  $request->input('datafinal');
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', base_path() . env('SSL'));
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
        $client->setDefaultOption('verify', base_path() . env('SSL'));
        $res = $client->get(
            '/getFatGerencialCliente?datainicial='.$datainicial.'&datafinal='.$datafinal ,
            Array('headers' => $headers)
        );
        return response($res->getBody());
    }
}
