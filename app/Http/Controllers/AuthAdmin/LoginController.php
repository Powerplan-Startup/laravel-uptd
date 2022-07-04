<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
        if(request('type') == 'admin'){
            return Auth::guard('admin');
        } else if(request('type') == 'pimpinan'){
            return Auth::guard('pimpinan');
        } else {
            return Auth::guard();
        }
    }
    
    protected function authenticated(Request $request, $user){
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    
    public function redirectTo()
    {
        if(request('type') == 'admin'){
            return $this->redirectTo;
        } else {
            return route('pimpinan.index');
        }
    }
}
