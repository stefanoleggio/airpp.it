<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Banner;

use App\Convegni;

use App\iniziative;

use App\Premi;

class NewsController extends Controller
{

    public function convegni(){
        return view('convegni',
            [
                'title' => 'Convegni',
                'banners' => Banner::where('page_id', 'convegni')->get(),
                'posts' => Convegni::orderby('id', 'DESC')->get()
            ]
        );
    }

    public function premi(){
        return view('premi',
            [
                'title' => 'Premi',
                'banners' => Banner::where('page_id', 'premi')->get(),
                'posts' => Premi::orderBy('id', 'DESC')->get()
            ]
        );
    }

    public function iniziative(){
        return view('iniziative',
            [
                'title' => 'Iniziative',
                'banners' => Banner::where('page_id', 'iniziative')->get(),
                'posts' => Iniziative::orderBy('id', 'DESC')->get()
            ]
        );
    }
}
