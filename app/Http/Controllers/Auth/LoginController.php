<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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
    
    public function username()
    {
        return 'nick_name';
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo(){
        $current_page = Session::get('url');
        if($current_page){
            Session::put('url',"");
        }
        else{
            $current_page = '/home';
        }
        return $current_page;
        
        
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        
//        $url = url()->current();
//        
//        $rest = substr($url, 13);
//        echo $rest;
//        exit();
//        Session::put('url',$rest);
    }
}
