<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Album;
use App\Photo;
use Redirect;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    public function galleria()
    {
        return view('admin.galleria',
            [

                'albums' => Album::all()
            ]
        );
    }

    public function foto($id)
    {
        return view('admin.photos',
            [
                'album' => Album::where('id', $id)->get(),
                'photos' => Photo::where('album_id', $id)->get()
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
        if($request->hasFile('file')){
            $file = $request->file('file');
            if(!$this->load_album($file, $album)){
                \Session::put('error', 'Errore generico');
                return Redirect::to('admin/galleria');
            }
        }
        $album->title = $request->title;
        $album->save();
        \Session::put('success', 'Modifica effettuata con successo');
        return Redirect::to('admin/galleria');
    }

    public function load_album($file, &$album){
        if($file->isValid()){
            false;
        }
        $fileName = $file->storeAs(env('THB_DIR'),'thb_'.$album->id.'.'.$file->extension());
        $trimmed = str_replace('/storage', '', $album->thb_path);
        Storage::delete($trimmed);
        $album->thb_path = env('STORAGE_DIR').$fileName;
        return true;
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

        if(!$request->hasFile('file')){
            \Session::put('error', 'Errore, è richiesta l\' immagine di copertina ');
            return Redirect::to('admin/galleria');
        }
        $file = $request->file('file');
        if(!$this->load_album($file, $album)){
            \Session::put('error', 'Errore, riprovare');
            return Redirect::to('admin/galleria');
        }
        $album->save();
        \Session::put('success', 'Album aggiunto con successo');
        return Redirect::to('admin/galleria');
    }

    public function delete_album(Request $request){
        $album = Album::find($request->id);
        $trimmed = str_replace('/storage', '', $album->thb_path);
        Storage::delete($trimmed);
        $photos = Photo::where('album_id', $album->id)->get();
        foreach($photos as $photo){
            $trim = str_replace('/storage', '', $photo->img_path);
            Storage::delete($trim);
            $photo->delete();
        }
        $album->delete();
        \Session::put('success', 'Modifica effettuata con successo');
        return Redirect::to('admin/galleria');
    }

    public function delete_photo(Request $request){
        $photo = Photo::find($request->id);
        $trimmed = str_replace('/storage', '', $photo->img_path);
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
            if($file->isValid()){
                $photo = new Photo;
                $photo->album_id = $request->album_id;
                $photo->save();
                $fileName = $file->storeAs(env('PHOTOS_DIR'),$request->album_id.'_'.$photo->id.'.'.$file->extension());
                $photo->img_path = env('STORAGE_DIR').$fileName;
                $photo->save();
            }
        }
        \Session::put('success', 'Foto aggiunte con successo');
        return Redirect::to('admin/galleria/'.$request->album_id);
    }
}
