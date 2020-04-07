<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Redirect;

use App\Album;

use App\Photo;

class AdminGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function galleria()
    {
        return view('admin.galleria',
            [

                'albums' => Album::paginate(5)
            ]
        );
    }

    public function foto($id)
    {
        return view('admin.photos',
            [
                'album' => Album::where('id', $id)->get(),
                'photos' => Photo::where('album_id', $id)->paginate(9)
            ]
        );
    }

    public function edit_album(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'file' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ],
            [
                'title.required' => 'Il titolo è richiesto',
            ]);
        $album = Album::find($request->id);
        $album->title = $request->title;
        $album->save();
        if($request->hasFile('file')){
            $file = $request->file('file');
            $this->load_file($file, $album, $request->db, "THB_DIR");
            $album->save();
        }
        \Session::put('success', 'Modifica effettuata con successo');
        return Redirect::to('admin/galleria');
    }

    public function add_album(Request $request){
        $request->validate(
            [
                'title' => 'required',
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ],
            [
                'title.required' => 'Il titolo è richiesto',
                'file.required' => 'Devi inserire l\'immagine di copertina',
            ]);
        $album = new Album;
        $album->title = $request->title;
        $album->save();
        $file = $request->file('file');
        $this->load_file($file, $album, $request->db, "THB_DIR");
        $album->save();
        \Session::put('success', 'Album aggiunto con successo');
        return Redirect::to('admin/galleria');
    }

    public function delete_album(Request $request){
        $album = Album::find($request->id);
        $trimmed = str_replace('/storage', '', $album->link);
        Storage::delete($trimmed);
        $photos = Photo::where('album_id', $album->id)->get();
        foreach($photos as $photo){
            $trim = str_replace('/storage', '', $photo->link);
            Storage::delete($trim);
            $photo->delete();
        }
        $album->delete();
        \Session::put('success', 'Modifica effettuata con successo');
        return Redirect::to('admin/galleria');
    }

    public function delete_photo(Request $request){
        $photo = Photo::find($request->id);
        $trimmed = str_replace('/storage', '', $photo->link);
        Storage::delete($trimmed);
        $photo->delete();
        \Session::put('success', 'Modifica effettuata con successo');
        return Redirect::to('admin/galleria/'.$request->album_id);
    }

    public function add_photo(Request $request){
        if(!$request->hasFile('file')){
            \Session::put('error', 'Errore, devi selezionare un file');
            return Redirect::to('admin/galleria/'.$request->album_id);
        }
        $files = $request->file('file');
        foreach($files as $file){
            $photo = new Photo;
            $photo->album_id = $request->album_id;
            $photo->save();
            $this->load_file($file, $photo, $request->db, "PHOTOS_DIR");
            $photo->save();
        }
        \Session::put('success', 'Foto aggiunte con successo');
        return Redirect::to('admin/galleria/'.$request->album_id);
    }
}
