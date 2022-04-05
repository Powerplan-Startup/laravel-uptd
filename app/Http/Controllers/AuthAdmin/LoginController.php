<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME_ADMIN;

    public function showLoginForm(){
        return view('auth.admin.login');
    }

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function username(){
        return 'username';
    }
    
    protected function guard(){
        return Auth::guard('admin');
    }
}
