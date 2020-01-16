<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
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

}
