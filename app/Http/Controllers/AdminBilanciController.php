<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Bilanci;

class AdminBilanciController extends Controller
{
    public function edit_bilanci(Request $request)
    {
        $request->validate(
            [
                'date' => 'required',
                'file' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf,jpg'
            ],
            [
                'date.required' => 'la data è richiesta',
                'file.required' => 'Il file è richiesto'
            ]);
        $data  = Bilanci::find($request->id);
        $data->date = $request->date;
        $data->description = $request->description;
        $data->save();
        if($request->hasFile('file')){
            $file = $request->file('file');
            $this->load_file($file, $data, $request->db, "BILANCI_DIR");
        }
        $data->save();
        return redirect('admin/pg_bilanci')->with('success', 'Modifica effettuata con successo');
    }

    public function add_bilanci(Request $request){
        $request->validate(
            [
                'date' => 'required',
                'file' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf,jpg'
            ],
            [
                'date.required' => 'la data è richiesta',
                'file.required' => 'Il file è richiesto'
            ]);
        $data  = new Bilanci;
        $data->date = $request->date;
        $data->description = $request->description;
        if(!$request->hasFile('file')){
            \Session::put('error', 'Errore, è richiesto il caricamento del file ');
            return Redirect::to('admin/pg_bilanci');
        }
        $data->save();
        $file = $request->file('file');
        $this->load_file($file, $data, $request->db, "BILANCI_DIR");
        $data->save();
        return redirect('admin/pg_bilanci')->with('success', 'Elemento aggiunto con successo');
    }

    public function delete_bilanci(Request $request){
        $data  = Bilanci::find($request->id);
        if(isset($data->link)){
            $trimmed = str_replace(env("STORAGE_DIR"), '', $data->link);
            Storage::delete($trimmed);
        }
        $data->delete();
        return redirect('admin/pg_bilanci')->with('success', 'Elemento rimosso con successo');
    }
}
