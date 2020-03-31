<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Banner;

use App\Convegni;

use App\Iniziative;

use App\Premi;

class NewsController extends Controller
{

    public function convegni(){
        return view('convegni',
            [
                'title' => 'Convegni',
                'banners' => Banner::where('page_id', 'convegni')->get(),
                'posts' => Convegni::orderby('id', 'DESC')->paginate(3)
            ]
        );
    }

    public function premi(){
        return view('premi',
            [
                'title' => 'Premi',
                'banners' => Banner::where('page_id', 'premi')->get(),
                'posts' => Premi::orderBy('id', 'DESC')->paginate(3)
            ]
        );
    }

    public function iniziative(){
        return view('iniziative',
            [
                'title' => 'Iniziative',
                'banners' => Banner::where('page_id', 'iniziative')->get(),
                'posts' => Iniziative::orderBy('id', 'DESC')->paginate(3)
            ]
        );
    }
}
