<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use Auth;
use App\Log;

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

    use AuthenticatesUsers {
        logout as performLogout;
    }

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

  

    public function attemptLogin(Request $request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
            'code' => $request['code']
        ];


        if (Auth::attempt($credentials)) {
            $data = new Log;
            $data->user = $request->email;
            $data->ip = $request->getClientIp();
            $data->login_at = Carbon::now()->toDateTimeString();
            $data->save();
            return redirect('/admin');
        }

        return false;
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required', 
            'password' => 'required',
            'code' => 'required'
        ]);
    }

    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect('/admin');
    }
}
