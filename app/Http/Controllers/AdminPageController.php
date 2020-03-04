<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Redirect;

use Illuminate\Support\Facades\Storage;

use App\Banner;

use App\View;

use App\Document;

use App\Link;

use App\Bilanci;

use App\Articolo;

class AdminPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pg_home(){
        return view('admin.pg_home',
            [
                'banners' => Banner::where('page_id', 'home')->get(),
                'views' => View::where('page_id', 'home')->get(),
                'datas' => Document::where('page_id', 'home')->get()
            ]
        );
    }

    public function pg_donazioni(){
        return view('admin.pg_donazioni',
            [
                'banners' => Banner::where('page_id', 'donazioni')->get(),
                'views' => View::where('page_id', 'donazioni')->get()
            ]
        );
    }
    
    public function pg_associarsi(){
        return view('admin.pg_associarsi',
            [
                'banners' => Banner::where('page_id', 'associarsi')->get(),
                'views' => View::where('page_id', 'associarsi')->get(),
                'datas' => Document::where('page_id', 'associarsi')->get()
            ]
        );
    }

    public function pg_galleria(){
        return view('admin.pg_galleria',
            [
                'banners' => Banner::where('page_id', 'galleria')->get()
            ]
        );
    }

    public function pg_statuto(){
        return view('admin.pg_statuto',
            [
                'banners' => Banner::where('page_id', 'statuto')->get(),
                'datas' => Document::where('page_id', 'statuto')->get()
            ]
        );
    }

    public function pg_bilanci(){
        return view('admin.pg_bilanci',
            [
                'banners' => Banner::where('page_id', 'bilanci')->get(),
                'datas' => Bilanci::orderBy('id', 'desc')->get()
            ]
        );
    }

    public function pg_biobanca(){
        return view('admin.pg_biobanca',
            [
                'banners' => Banner::where('page_id', 'biobanca')->get(),
                'views' => View::where('page_id', 'biobanca')->get()
            ]
        );
    }

    public function pg_parlanodinoi(){
        return view('admin.pg_parlanodinoi',
            [
                'banners' => Banner::where('page_id', 'parlanodinoi')->get(),
                'links' => Link::where('page_id', 'parlanodinoi')->get()
            ]
        );
    }

    public function pg_articoli(){
        return view('admin.pg_articoli',
            [
                'banners' => Banner::where('page_id', 'articoli')->get(),
                'datas' => Articolo::orderBy('id', 'desc')->get()
            ]
        );
    }

    public function pg_cookie(){
        return view('admin.pg_cookie',
            [
                'banners' => Banner::where('page_id', 'cookie')->get()
            ]
        );
    }

    public function pg_attivita(){
        return view('admin.pg_attivita',
            [
                'in' => Banner::where('page_id', 'iniziative')->get(),
                'pr' => Banner::where('page_id', 'premi')->get(),
                'co' => Banner::where('page_id', 'convegni')->get()
            ]
        );
    }

    public function pg_segnalazioni(){
        return view('admin.pg_segnalazioni',
            [
                'banners' => Banner::where('page_id', 'segnalazioni')->get()
            ]
        );
    }

    public function pg_contatti(){
        return view('admin.pg_contatti',
            [
                'banners' => Banner::where('page_id', 'contatti')->get()
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
