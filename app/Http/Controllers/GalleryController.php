<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Album;

use App\Photo;

class GalleryController extends Controller
{
    public function index(){
        return view('galleria',
            [
                'title' => 'Galleria',
                'banners' => DB::table('banners')->where('page_id', 'galleria')->get(),
                'albums' => Album::all()
            ]
        );
    }

    public function getPhotos($id){
        return view('photos',
        [
            'title' => 'Galleria',
            'album' => Album::where('id', $id)->get(),
            'photos' => Photo::where('album_id', $id)->get()
        ]
    );
    }
}
