<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function convegni(){
        return view('convegni',
            [
                'title' => 'Convegni',
                'banners' => DB::table('banners')->where('page_id', 'convegni')->get(),
                'posts' => DB::table('convegni')->orderBy('id', 'DESC')->get()
            ]
        );
    }

    public function premi(){
        return view('premi',
            [
                'title' => 'Premi',
                'banners' => DB::table('banners')->where('page_id', 'premi')->get(),
                'posts' => DB::table('premi')->orderBy('id', 'DESC')->get()
            ]
        );
    }

    public function iniziative(){
        return view('iniziative',
            [
                'title' => 'Iniziative',
                'banners' => DB::table('banners')->where('page_id', 'iniziative')->get(),
                'posts' => DB::table('iniziative')->orderBy('id', 'DESC')->get()
            ]
        );
    }
}
