<?php

namespace App\Http\Controllers\Auth\Rest;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request){
        return view('pages.auth.login');
    }

    public function login(Request $request){
        $email =  $request->get('email');
        $password =  $request->get('password');
        $this->token($email,$password);
        if ( session('token')){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login');
        }
    }

    public function token($email = '',$password = ''){
        $auth = ['email' => $email, 'password' => $password];
        $client = new Client();
        $client->setDefaultOption('verify', env('SSL'));
        $res = $client->post(env('API_URL').'/sessions', Array('json' => $auth) );
        $token = json_decode($res->getBody())->token;
        session(['token' => $token]);
    }
}
