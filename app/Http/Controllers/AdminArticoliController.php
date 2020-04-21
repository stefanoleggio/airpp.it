<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Articolo;

class AdminArticoliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit_articoli(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
            ],
            [
                'title.required' => 'il titolo è richiesta',
            ]);
        $data  = Articolo::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        if($request->hasFile('file')){
            $file = $request->file('file');
            $this->load_file($file, $data, $request->db, "ARTICOLI_DIR");
        }
        $data->save();
        if($request->page_id == "covid"){
            return redirect('admin/covid')->with('success', 'Modifica effettuata con successo');
        }
        return redirect('admin/pg_articoli')->with('success', 'Modifica effettuata con successo');
    }

    public function add_articoli(Request $request){
        $request->validate(
            [
                'title' => 'required',
                'file' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf,jpg'
            ],
            [
                'title.required' => 'il titolo è richiesta',
                'file.required' => 'Il file è richiesto'
            ]);
        $data  = new Articolo;
        $data->page_id = $request->page_id;
        $data->title = $request->title;
        $data->description = $request->description;
        if(!$request->hasFile('file')){
            \Session::put('error', 'Errore, è richiesto il caricamento del file ');
            return Redirect::to('admin/pg_articoli');
        }
        $data->save();
        $file = $request->file('file');
        $this->load_file($file, $data, $request->db, "ARTICOLI_DIR");
        $data->save();
        /*COVID*/
        if($request->page_id == "covid"){
            return redirect('admin/covid')->with('success', 'Elemento aggiunto con successo');
        }
        /**/
        return redirect('admin/pg_articoli')->with('success', 'Elemento aggiunto con successo');
    }

    public function delete_articoli(Request $request){
        $data  = Articolo::find($request->id);
        if(isset($data->link)){
            $trimmed = str_replace(env("STORAGE_DIR"), '', $data->link);
            Storage::delete($trimmed);
        }
        $data->delete();
        /*COVID*/
        if($request->page_id == "covid"){
            return redirect('admin/covid')->with('success', 'Elemento rimosso con successo');
        }
        /**/
        return redirect('admin/pg_articoli')->with('success', 'Elemento rimosso con successo');
    }
}
