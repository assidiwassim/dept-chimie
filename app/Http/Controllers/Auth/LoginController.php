<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


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
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function authenticated()
    {
            if(Auth::user()->role=="user")
                 return redirect('/labo');
            else
                 return redirect('/admin');
    }

    protected function attemptLogin(Request $request)
    {
        $this->validate($request, [
            'email'           => 'required|max:255|email',
            'password'           => 'required',
            'captcha'        => 'required|captcha'
        ]);

        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


}
