<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Banner;

use App\Convegni;

use App\Iniziative;

use App\Premi;

use Illuminate\Support\Facades\Route;

class NewsController extends Controller
{

    function index()
    {
        $uri = Route::currentRouteName();
        return view('attivita',
            [
                'title' => ucfirst($uri).' - Associazione Italiana Ricerca Patologie Polmonari',
                'banners' => Banner::where('page_id', $uri)->get(),
                'data' => DB::table($uri)->orderBy('id', 'DESC')->paginate(3)
            ]
        );
    }

    function fetch_data(Request $request)
    {
        $uri = Route::currentRouteName();
        if($request->ajax())
        {
            return view('includes.newstab', 
                [
                    'data' => DB::table($uri)->orderBy('id', 'DESC')->paginate(3)
                ]
            )->render();
        }
    } 

}
