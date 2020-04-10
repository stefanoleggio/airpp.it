<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Redirect;

use App\Log;

use App\Iscrizione;

use App\Donazione;

use App\Messaggio;

use App\User;

class MasterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master');
    }

    public function users()
    {
        return view('admin.users',
            [

                'users' => User::all()
            ]
        );
    }

    public function logs()
    {
        return view('admin.logs',
            [

                'logs' => log::orderBy('id', 'desc')->paginate(10)
            ]
        );
    }

    public function clear_logs(){
        Log::truncate();
        \Session::put('success', 'Pulizia completata con successo');
        return Redirect::to('admin/logs');
    }

    public function clear_iscrizioni(){
        Iscrizione::truncate();
        \Session::put('success', 'Pulizia completata con successo');
        return Redirect::to('admin/iscrizioni');
    }

    public function clear_donazioni(){
        Donazione::truncate();
        \Session::put('success', 'Pulizia completata con successo');
        return Redirect::to('admin/donazioni');
    }

    public function clear_messaggi(){
        Messaggio::truncate();
        \Session::put('success', 'Pulizia completata con successo');
        return Redirect::to('admin/messaggi');
    }

    public function edit_users(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'code' => 'required'
            ],
            [
                'name.required' => 'Devi inserire il nome',
                'code.required' => 'Devi inserire il codice',
                'email.required' => 'Devi inserire l\'email',
                'email.email' => 'L\'indirizzo email deve essere valido'
            ]);
        DB::table('users')
            ->where('id', $request->id)
            ->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'code' => $request->code,
                ]
            );
            \Session::put('success', 'Modifica effettuata con successo');
            return Redirect::to('admin/users');
    }

    public function add_users(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'code' => 'required',
                'password' => 'required|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
            ],
            [
                'name.required' => 'Devi inserire il nome',
                'code.required' => 'Devi inserire il codice',
                'email.required' => 'Devi inserire l\'email',
                'email.email' => 'L\'indirizzo email deve essere valido',
                'password.required' => 'Devi inserire la password',
                'password.confirmed' => 'Le due password non corrispondono',
                'password.min' => 'La password deve essere di almeno 6 caratteri',
                'password.regex' => 'Devi rispettare i criteri della password'
            ]);
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'code' => $request->code,
            'password' => bcrypt($request->password),
            'role' => 'user'
        ]);
        \Session::put('success', 'Utente aggiunto con successo');
        return Redirect::to('admin/users');
    }

    public function delete_users(Request $request){
        if(Auth::user()->id != $request->id){
            DB::table('users')->where('id', $request->id)->delete();
            \Session::put('success', 'Elemento eliminato con successo');
            return Redirect::to('admin/users');
        }
        \Session::put('error', 'Non puoi eliminare un utente in uso');
        return Redirect::to('admin/users');
    }

}
