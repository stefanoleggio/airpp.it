<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Redirect;

use App\Log;

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

                'users' => DB::table('users')->get()
            ]
        );
    }

    public function logs()
    {
        $this->clear_logs();
        return view('admin.logs',
            [

                'logs' => log::all()
            ]
        );
    }

    public function clear_logs(){
        $logs = Log::all();
        if($logs->count()>20){
            for($k = 19; $k < $logs->count(); $k++){
                $logs[$k]->delete();
            }
        }
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
