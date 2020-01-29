<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
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

    /**
     * generate token session
     *
     * @param string $email
     * @param string $password
     * @return bool|mixed
     */
    public function token($email = '',$password = ''){
        $auth = ['email' => $email, 'password' => $password];
        $client = new Client();
        $client->setDefaultOption('verify', base_path() . env('SSL'));

        try {
            $res = $client->post(env('API_URL').'/sessions', Array('json' => $auth) );
            $user= json_decode($res->getBody());
            $token = $user->token;
            session(['token' => $token]);
        }catch (RequestException $e){
            session(['error'=>'Usuario ou senha incorretos']);
            $user = false;
        }

        return $user;
    }

    /**
     * function login
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request) {
        $email =  $request->get('user');
        $password =  $request->get('password');
        $user = $this->token($email,$password);

        if ( session ('token') ) {

            $authe = new User( array( "email" => 'rogeriorossa@hotmail.com',"password" => bcrypt('12345678')));
            $authe->setAllAttributes(['name'=>'name']);
            $this->guard()->login($authe);
            session(['name' => $user->user->name]);
            session(['email' => $user->user->email]);
            session(['admin' => $user->user->admin]);
            session(['active' => $user->user->active]);
            //$authe->setAllAttributes(['name'=>,'email'=>$user->user->email]);
            //dd(Auth::user());

           return Redirect::back ();
        } else {
            Session::flash ( 'message', "Invalid Credentials , Please try again." );
            return Redirect::back ();
        }
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
