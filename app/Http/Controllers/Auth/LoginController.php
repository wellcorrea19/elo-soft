<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request) {
        $email =  $request->get('email');
        $password =  $request->get('password');
        $this->token($email,$password);

        if ( session ('token') ) {

            $authe = new User( array( "email" => $email,"password" => bcrypt($password)));
            $authe->setAllAttributes(['name'=>'name']);
            //$user = new User(["username" => $api.Usuario, "email" => $api.Email]);
            $this->guard()->login($authe);
            //Auth::login($authe);
           // dd(Auth::user());
//            if( $this->guard()->login($authe)){
//                return Redirect::back ();
//            }
           return Redirect::back ();
        } else {
            Session::flash ( 'message', "Invalid Credentials , Please try again." );
            return Redirect::back ();
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

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
