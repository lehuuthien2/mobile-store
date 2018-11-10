<?php

namespace mobileS\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use mobileS\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
//    protected $redirectTo = '/';

//    Path Customization
    protected function redirectTo()
    {
        if (Auth::user()->permission == 1) {
            return $this->redirectTo = '/';
        }
        return $this->redirectTo = '/manages';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guests')->except('logout');
    }

    public function username()
    {
        return 'username';
    }


}
