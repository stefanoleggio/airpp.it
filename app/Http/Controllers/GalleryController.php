<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        return view('galleria',
            [
                'title' => 'Galleria',
                'banners' => DB::table('banners')->where('page_id', 'galleria')->get(),
                'albums' => DB::table('albums')->get()
            ]
        );
    }

    public function getPhotos($id){
        return view('photos',
        [
            'title' => 'Galleria',
            'album' => DB::table('albums')->where('id', $id)->get(),
            'photos' => DB::table('photos')->where('album_id', $id)->get()
        ]
    );
    }
}
