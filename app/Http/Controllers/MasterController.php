<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MasterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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

    public function edit_users(Request $request)
    {
        DB::table('users')
            ->where('id', $request->id)
            ->update(
                [
                    'name' => $request->name,
                    'email' => $request->email
                ]
            );
            \Session::put('success', 'Modifica effettuata con successo');
            return Redirect::to('admin/users');
    }

    public function add_users(Request $request){
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
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
