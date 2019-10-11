<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Convegni;
use App\Premi;
use App\Iniziative;
use Redirect;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function premi()
    {
        return view('admin.premi',
            [
        
                'datas' => Premi::orderBy('id', 'desc')->get()
            ]
        );
    }

    public function convegni()
    {
        return view('admin.convegni',
            [
        
                'datas' => Convegni::orderBy('id', 'desc')->get()
            ]
        );
    }

    public function iniziative()
    {
        return view('admin.iniziative',
            [
        
                'datas' => Iniziative::orderBy('id', 'desc')->get()
            ]
        );
    }

    public function setNews($type){
        $data;
        switch($type){
            case "premi":
                $data = new Premi;
            break;
            case "convegni":
                $data = new Convegni;
            break;
            case "iniziative":
                $data = new iniziative;
            break;
            default:
                return Redirect::to('admin/');
        }
        return $data;
    }

    public function findNews($type, $id){
        $data;
        switch($type){
            case "premi":
                $data = Premi::find($id);
            break;
            case "convegni":
                $data = Convegni::find($id);
            break;
            case "iniziative":
                $data = Iniziative::find($id);
            break;
            default:
                return Redirect::to('admin/');
        }
        return $data;
    }

    public function load_file($file, &$data, $db){
        if(!$file->isValid()){
            return redirect('admin/'.$db)->with('errore', 'Errore, riprovare');
        }
        $fileName = $file->storeAs(env('LOCANDINE_DIR'),$db.'_'.$data->id.'.'.$file->extension());
        $trimmed = str_replace('/storage', '', $data->link);
        Storage::delete($trimmed);
        $data->link = env('STORAGE_DIR').$fileName;
    }

    public function edit_news(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'place' => 'required',
                'date' => 'required'
            ],
            [
                'title.required' => 'Il titolo è richiesto',
                'description.required' => 'La descrizione è richiesta',
                'place.required' => 'Il luogo è richiesto',
                'date.required' => 'la data è richiesta'
            ]);
        $data  = $this->findNews($request->db, $request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->place = $request->place;
        $data->date = $request->date;
        if($request->active == 'on'){
            $data->active = 1;
        }else{
            $data->active = 0;
        }
        $data->link = $request->link;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $this->load_file($file, $data, $request->db);
        }
        $data->save();
        return redirect('admin/'.$request->db)->with('success', 'Modifica effettuata con successo');
    }

    public function add_news(Request $request){
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'place' => 'required',
                'date' => 'required'
            ],
            [
                'title.required' => 'Il titolo è richiesto',
                'description.required' => 'La descrizione è richiesta',
                'place.required' => 'Il luogo è richiesto',
                'date.required' => 'la data è richiesta'
            ]);
        $data  = $this->setNews($request->db);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->place = $request->place;
        $data->date = $request->date;
        $data->active = $request->has('active');
        $data->save();
        if($request->hasFile('file')){
            $file = $request->file('file');
            $this->load_file($file, $data, $request->db);
        }
        $data->save();
        return redirect('admin/'.$request->db)->with('success', 'Elemento aggiunto con successo');
    }

    public function delete_news(Request $request){
        $data  = $this->findNews($request->db, $request->id);
        if(isset($data->link)){
            $trimmed = str_replace('/storage', '', $data->link);
            Storage::delete($trimmed);
        }
        $data->delete();
        return redirect('admin/'.$request->db)->with('success', 'Elemento rimosso con successo');
    }
}
