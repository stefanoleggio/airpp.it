<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class AdminPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pg_home(){
        return view('admin.pg_home',
            [
                'banners' => DB::table('banners')->where('page_id', 'home')->get(),
                'views' => DB::table('views')->where('page_id', 'home')->get()
            ]
        );
    }

    public function pg_donazioni(){
        return view('admin.pg_donazioni',
            [
                'banners' => DB::table('banners')->where('page_id', 'donazioni')->get(),
                'views' => DB::table('views')->where('page_id', 'donazioni')->get()
            ]
        );
    }
    
    public function pg_associarsi(){
        return view('admin.pg_associarsi',
            [
                'banners' => DB::table('banners')->where('page_id', 'associarsi')->get(),
                'views' => DB::table('views')->where('page_id', 'associarsi')->get()
            ]
        );
    }

    public function pg_galleria(){
        return view('admin.pg_galleria',
            [
                'banners' => DB::table('banners')->where('page_id', 'galleria')->get()
            ]
        );
    }

    public function pg_statuto(){
        return view('admin.pg_statuto',
            [
                'banners' => DB::table('banners')->where('page_id', 'statuto')->get()
            ]
        );
    }

    public function pg_cookies(){
        return view('admin.pg_cookies',
            [
                'banners' => DB::table('banners')->where('page_id', 'cookies')->get()
            ]
        );
    }

    public function pg_segnalazioni(){
        return view('admin.pg_segnalazioni',
            [
                'banners' => DB::table('banners')->where('page_id', 'segnalazioni')->get()
            ]
        );
    }

    public function pg_contatti(){
        return view('admin.pg_contatti',
            [
                'banners' => DB::table('banners')->where('page_id', 'contatti')->get()
            ]
        );
    }

    public function edit_pages(Request $request){
    $request->validate(
        [
            'title' => 'required',
            'description' => 'required',
        ],
        [
            'title.required' => 'Il titolo è richiesto',
            'description.required' => 'La descrizione è richiesta'
        ]);
        DB::table($request->db)
            ->where('id', $request->id)
            ->update(
                [
                    'title' => $request->title,
                    'description' => $request->description
                ]
            );
            \Session::put('success', 'Modifica effettuata con successo');
            if($request->pg_name == "email_iscrizioni" | $request->pg_name == "email_donazioni"){
                return Redirect::to('admin/email');
            }
            return Redirect::to('admin/pg_'.$request->pg_name);
    }
}
