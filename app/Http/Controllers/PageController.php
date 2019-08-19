<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('home',
            [
                'title' => 'Home',
                'banners' => DB::table('banners')->where('page_id', 'home')->get()
            ]
        );
    }

    public function donazioni(){
        return view('donazioni',
            [
                'title' => 'Donazioni',
                'banners' => DB::table('banners')->where('page_id', 'donazioni')->get(),
                'datas' => DB::table('views')->where('page_id', 'donations')->get(),
                'msgs' => DB::table('msgs')->where('scope_id', 'donation__info')->get()
            ]
        );
    }

    public function associarsi(){
        return view('associarsi',
            [
                'title' => 'Associarsi',
                'banners' => DB::table('banners')->where('page_id', 'associarsi')->get()
            ]
        );
    }

    public function contatti(){
        return view('contatti',
            [
                'title' => 'Contatti',
                'banners' => DB::table('banners')->where('page_id', 'contatti')->get()
            ]
        );
    }

    public function statuto(){
        return view('statuto',
            [
                'title' => 'Statuto',
                'banners' => DB::table('banners')->where('page_id', 'statuto')->get()
            ]
        );
    }

    public function cookies(){
        return view('cookies',
            [
                'title' => 'Cookies',
            ]
        );
    }

    public function segnalazioni(){
        return view('segnalazioni',
            [
                'title' => 'Segnalazioni',
            ]
        );
    }
}
