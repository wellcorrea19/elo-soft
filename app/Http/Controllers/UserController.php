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
        return view('pages.user-admin.user');
    }

    public function storeUser(Request $request){
        $body['name'] =  $request->get('name');
        $body['email'] =  $request->get('email');
        $body['password']=  $request->get('password');

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

}
