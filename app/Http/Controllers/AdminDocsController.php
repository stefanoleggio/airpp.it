<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Document;


class AdminDocsController extends Controller
{
    public function edit_docs(Request $request){
        $request->validate(
            [
                'file' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf,jpg'
            ],
            [
                'file.required' => 'Il file è richiesto'
            ]);
        if(!$request->hasFile('file')){
            \Session::put('error', 'Errore, è richiesto il caricamento del file ');
            return Redirect::to('admin/pg_'.$db);
        }
        $data = Document::find($request->id);
        $file = $request->file('file');
        $this->load_file($file, $data, $request->db, "DOC_DIR");
        $data->save();
        return redirect('admin/pg_'.$request->db)->with('success', 'Elemento aggiunto con successo');
    }
}
