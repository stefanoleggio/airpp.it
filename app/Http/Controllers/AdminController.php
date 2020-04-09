<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Redirect;

use App\User;

use App\Team;

use App\Donazione;

use App\Iscrizione;

use App\Email;

use App\Messaggio;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function profilo()
    {
        return view('admin.profilo',
            [

                'user' => Auth::user()
            ]
        );
    }

    public function edit_profilo(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
            ],
            [
                'name.required' => 'Il nome è richiesto',
                'email.required' => 'La email è richiesta'
            ]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        \Session::put('success', 'Modifica effettuata con successo');
        return Redirect::to('admin/profilo');
    }

    public function edit_pssw(Request $request){
        $request->validate(
            [
                'password' => 'required|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
            ],
            [
                'password.required' => 'Devi inserire la password',
                'password.confirmed' => 'Le due password non corrispondono',
                'password.min' => 'La password deve essere di almeno 6 caratteri',
                'password.regex' => 'Devi rispettare i criteri della password'
            ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();
        \Session::put('success', 'Modifica effettuata con successo');
        return Redirect::to('admin/profilo');
    }

    public function donazioni()
    {
        if(Auth::user()->role == 'master'){
            return view('admin.donazioni',
                [

                    'datas' => Donazione::orderby('id', 'DESC')->paginate(10)
                ]
            );
        }
        return view('admin.donazioni',
            [

                'datas' => Donazione::where('success', '1')->orderby('id', 'DESC')->paginate(10)
            ]
        );
    }

    public function iscrizioni()
    {
        if(Auth::user()->role == 'master'){
            return view('admin.iscrizioni',
                [

                    'datas' => Iscrizione::orderby('id', 'DESC')->paginate(10)
                ]
            );
        }
        return view('admin.iscrizioni',

            [
                'datas' => Iscrizione::where('success', '1')->orderby('id', 'DESC')->paginate(10)
            ]
        );
    }

    public function messaggi()
    {
        return view('admin.messaggi',
            [

                'datas' => Messaggio::orderby('id', 'DESC')->paginate(10)
            ]
        );
    }

    public function email()
    {
        return view('admin.email',
            [

                'datas' => Email::all()
            ]
        );
    }
}
