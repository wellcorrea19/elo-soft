<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use function Psy\debug;

class UserController extends Controller
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
        $companys =json_decode( $this->listComapanys()->content(),false);
        return view('pages.user-admin.user',
            array('companys'=>$companys->company)
        );
    }

    public function listComapanys(){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', base_path() . env('SSL'));
        $res = $client->get('/companys?id=' , Array('headers' => $headers) );
        return response($res->getBody());

    }

    public function listUsers(Request $request, $id){
        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', base_path() . env('SSL'));
        $res = $client->get('/users?company_id='.$id , Array('headers' => $headers) );
        return response($res->getBody());

    }

    public function updateUser(Request $request){

        $body['name']= $request->get('name');
        $body['email']= $request->get('email');
        $body['active']=  $request->get('active');
        $body['admin']=  $request->get('admin');
        $body['company_id']= $request->get('company_id');

        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', base_path() . env('SSL'));
        $res = $client->put('/users?id='.$request->get('id') , Array('headers' => $headers,'json' => $body) );

        return response($res->getBody());
    }

    public function updateCompany(Request $request){
        $body['id']= $request->get('id');
        $body['cnpj']= $request->get('cnpj');
        $body['name']=  $request->get('name');
        $body['email']=  $request->get('email');
        $body['host']= $request->get('host');
        $body['users_limit']= $request->get('users_limit');
        $body['active']= true;

        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', base_path() . env('SSL'));
        $res = $client->put('/companys' , Array('headers' => $headers,'json' => $body));

        return response($res->getBody());
    }

    public function storeUser(Request $request){
        $body['name'] =  $request->get('name');
        $body['email'] =  $request->get('email');
        $body['password']=  $request->get('password');
        $body['company_id']=  $request->get('company_id');
        $body['active']=  true;
        $body['admin']=  false;

        $token =  session('token');
        $headers = [ 'Authorization' => "Bearer $token" ];
        $client = new Client(['base_url' =>  env('API_URL')]);
        $client->setDefaultOption('verify', base_path() . env('SSL'));
        $typeMsg='success';
        $msg='Usuario criado';
        try {
            $res = $client->post('/users' , Array('headers' => $headers,'json' => $body) );
        } catch (RequestException $e) {
            if ($e->getResponse()->getStatusCode() == '400') {
                $typeMsg ='error';
                $msg = 'Usuario existente';
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
