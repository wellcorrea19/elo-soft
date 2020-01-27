<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use function Psy\debug;

class CompanyController extends Controller
{
    /**
     * @var \Illuminate\Session\SessionManager|\Illuminate\Session\Store
     */
    protected $token;

    public function __construct()
    {
        $this->token = session('token');
    }



    public function listComapanys(){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', base_path() . env('SSL'));
        $res = $client->get('/companys?id=' , Array('headers' => $headers) );
        return response($res->getBody());

    }


    public function updateCompany(Request $request){
        $body['active']=  $request->get('active');
        $body['admin']=  $request->get('admin');

        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', base_path() . env('SSL'));
        $typeMsg='success';
        $res = $client->put('/users?id='.$request->get('id') , Array('headers' => $headers,'json' => $body) );
        $msg='Usuario criado';
        dd($res->getBody());
        try {


        } catch (RequestException $e) {
            if ($e->getResponse()->getStatusCode() == '400') {
                $typeMsg ='error';
                $msg = 'Usuario atualizado';
            }
        }

        return redirect()->route('user')->with($typeMsg,$msg);
    }



    public function storeCompany(Request $request){

        $body['cnpj'] =  $request->get('cnpj');
        $body['name'] =  $request->get('name');
        $body['email'] =  $request->get('email');
        $body['host']=  $request->get('host');
        $body['users_limit'] =  (integer) $request->get('users_limit');
        $body['active'] = true;

        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', base_path() . env('SSL'));
        $typeMsg='success';
        $msg='Empresa criada com sucesso';
        try {
            $res = $client->post('/companys' , Array('headers' => $headers,'json' => $body) );
        } catch (RequestException $e) {
            if ($e->getResponse()->getStatusCode() == '400') {
                $typeMsg ='error';
                $msg = 'Empresa existente';
            }
        }

        return redirect()->route('user')->with($typeMsg,$msg);
    }

}
