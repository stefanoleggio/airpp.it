<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Carbon\Carbon;

use Auth;

use App\Log;

use App\Rules\Captcha;

use App\Mail\LogEmail;

use App\Mail\SecurityEmail;

use Session;

use ThrottlesLogins;

use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    public $maxattempts = 2;

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

    public function login(Request $request)
    {

        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->maxattempts = $this->maxattempts * 2;
            Mail::to(env('MAIL_DEV'))->send(new SecurityEmail($request));
            $this->clearLoginAttempts($request);
        }

        if($this->tryLogin($request)) {
            $this->clearLoginAttempts($request);
            return redirect('/admin');
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);

    }

    protected function sendFailedLoginResponse(Request $request, $trans = 'auth.failed')
    {
        $errors = [$this->username() => trans($trans)];
        return redirect('/login')->withErrors($errors);
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        $attempts = $this->maxattempts;
        $lockoutMinites = 0;
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), $attempts, $lockoutMinites
        );
    }

    public function tryLogin(Request $request)
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
            
            return true;
        }

        return false;
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required', 
            'password' => 'required',
            'code' => 'required',
            'g-recaptcha-response' => new Captcha()
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
