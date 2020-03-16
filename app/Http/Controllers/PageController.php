<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Banner;

use App\Articolo;

use App\Team;

use App\Document;

use App\View;

use App\Contact;

use App\Link;

use App\Bilanci;

class PageController extends Controller
{
    public function home(){
        return view('home',
            [
                'title' => 'Home',
                'banners' => Banner::where('page_id', 'home')->get(),
                'views' => View::where('page_id', 'home')->get(),
                'data' => Document::where('page_id', 'home')->get(),
                'users_cd' => Team::where('team_id', 'consiglio direttivo')->get(),
                'users_cs' => Team::where('team_id', 'comitato scientifico')->get(),
                'users_ssea' => Team::where('team_id', 'segreteria scientifica e amministrativa')->get(),
                'users_cev' => Team::where('team_id', 'comitato eventi')->get(),
                'users_cet' => Team::where('team_id', 'comitato etico')->get()
            ]
        );
    }

    public function donazioni(){
        return view('donazioni',
            [
                'title' => 'Donazioni',
                'banners' => Banner::where('page_id', 'donazioni')->get(),
                'datas' => View::where('page_id', 'donazioni')->get(),
                'msgs' => DB::table('msgs')->where('scope_id', 'donation__info')->get()
            ]
        );
    }

    public function associarsi(){
        return view('associarsi',
            [
                'title' => 'Associarsi',
                'banners' => Banner::where('page_id', 'associarsi')->get(),
                'datas' => View::where('page_id', 'associarsi')->get(),
                'msgs' => DB::table('msgs')->where('scope_id', 'iscrizione__info')->get(),
                'docs' => Document::where('page_id', 'associarsi')->get()
            ]
        );
    }

    public function biobanca(){
        return view('biobanca',
            [
                'title' => 'Biobanca',
                'banners' => Banner::where('page_id', 'biobanca')->get(),
                'text' => View::where('page_id', 'biobanca')->get()
            ]
        );
    }

    public function parlanodinoi(){
        return view('parlanodinoi',
            [
                'title' => 'Parlano di noi',
                'banners' => Banner::where('page_id', 'parlanodinoi')->get(),
                'links' => Link::where('page_id', 'parlanodinoi')->get()
            ]
        );
    }

    public function articoli(){
        return view('articoli',
            [
                'title' => 'Articoli',
                'banners' => Banner::where('page_id', 'articoli')->get(),
                'posts' => Articolo::all()
            ]
        );
    }

    public function contatti(){
        return view('contatti',
            [
                'title' => 'Contatti',
                'banners' => Banner::where('page_id', 'contatti')->get(),
                'telefono' => Contact::where('page_id', 'telefono')->get(),
                'email' => Contact::where('page_id', 'email')->get(),
                'sede' => Contact::where('page_id', 'sede')->get()
            ]
        );
    }

    public function statuto(){
        return view('statuto',
            [
                'title' => 'Statuto',
                'banners' => Banner::where('page_id', 'statuto')->get(),
                'datas' => Document::where('page_id', 'statuto')->get()
            ]
        );
    }

    public function bilanci(){
        return view('bilanci',
            [
                'title' => 'Bilanci',
                'banners' => Banner::where('page_id', 'bilanci')->get(),
                'posts' => Bilanci::orderBy('id', 'desc')->get()
            ]
        );
    }

    public function cookie(){
        return view('cookie',
            [
                'title' => 'Cookie',
                'banners' => Banner::where('page_id', 'cookie')->get()
            ]
        );
    }
}
