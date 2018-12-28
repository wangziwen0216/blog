<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

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
    protected $redirectTo = '/admin';

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
     * Validate Login.
     *
     * @var    string    password
     * @return   array     ['status':,'msg':]
     */
    public function validateLogin(Request $request)
    {
        $this->validate($request, [
            'user_phone' => 'required|regex:/^1[34578][0-9]{9}$/',
            'user_password' => 'required',
        ], [
            'user_phone.required' => 'Please fill out phone number!',
            'user_password.required' => 'Please fill out password!',
            'regex' => 'Please fill out correct phone number!',

        ]);
    }

    /**
     * Admin login.
     *
     * @var    string    password
     * @return   array     ['status':,'msg':]
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        dd(config('time.'));
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            //login log
//            $this->writeLogs(['email'=>$request->input('email'), 'login_ip'=>$request->ip(), 'login_result'=>0, 'comments'=>'限制登录10分钟']);

            return $this->sendLockoutResponse($request);
        }
    }
}
