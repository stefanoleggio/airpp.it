<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use App\Document;
use App\Bilanci;
use Illuminate\Support\Facades\Storage;

class AdminPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pg_home(){
        return view('admin.pg_home',
            [
                'banners' => DB::table('banners')->where('page_id', 'home')->get(),
                'views' => DB::table('views')->where('page_id', 'home')->get(),
                'datas' => Document::where('page_id', 'home')->get()
            ]
        );
    }

    public function pg_donazioni(){
        return view('admin.pg_donazioni',
            [
                'banners' => DB::table('banners')->where('page_id', 'donazioni')->get(),
                'views' => DB::table('views')->where('page_id', 'donazioni')->get()
            ]
        );
    }
    
    public function pg_associarsi(){
        return view('admin.pg_associarsi',
            [
                'banners' => DB::table('banners')->where('page_id', 'associarsi')->get(),
                'views' => DB::table('views')->where('page_id', 'associarsi')->get()
            ]
        );
    }

    public function pg_galleria(){
        return view('admin.pg_galleria',
            [
                'banners' => DB::table('banners')->where('page_id', 'galleria')->get()
            ]
        );
    }

    public function pg_statuto(){
        return view('admin.pg_statuto',
            [
                'banners' => DB::table('banners')->where('page_id', 'statuto')->get(),
                'datas' => Document::where('page_id', 'statuto')->get()
            ]
        );
    }

    public function pg_bilanci(){
        return view('admin.pg_bilanci',
            [
                'banners' => DB::table('banners')->where('page_id', 'bilanci')->get(),
                'datas' => Bilanci::orderBy('id', 'desc')->get()
            ]
        );
    }

    public function pg_cookies(){
        return view('admin.pg_cookies',
            [
                'banners' => DB::table('banners')->where('page_id', 'cookies')->get()
            ]
        );
    }

    public function pg_segnalazioni(){
        return view('admin.pg_segnalazioni',
            [
                'banners' => DB::table('banners')->where('page_id', 'segnalazioni')->get()
            ]
        );
    }

    public function pg_contatti(){
        return view('admin.pg_contatti',
            [
                'banners' => DB::table('banners')->where('page_id', 'contatti')->get()
            ]
        );
    }

    public function edit_pages(Request $request){
    $request->validate(
        [
            'title' => 'required',
            'description' => 'required',
        ],
        [
            'title.required' => 'Il titolo è richiesto',
            'description.required' => 'La descrizione è richiesta'
        ]);
        DB::table($request->db)
            ->where('id', $request->id)
            ->update(
                [
                    'title' => $request->title,
                    'description' => $request->description
                ]
            );
            \Session::put('success', 'Modifica effettuata con successo');
            if($request->pg_name == "email_iscrizioni" | $request->pg_name == "email_donazioni"){
                return Redirect::to('admin/email');
            }
            return Redirect::to('admin/pg_'.$request->pg_name);
    }

    public function edit_docs(Request $request){
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

    public function edit_bilanci(Request $request)
    {
        $request->validate(
            [
                'date' => 'required',
            ],
            [
                'date.required' => 'la data è richiesta',
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
                'date' => 'required'
            ],
            [
                'date.required' => 'la data è richiesta'
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

    public function load_file($file, &$data, $db, $dir){
        if(!$file->isValid()){
            return redirect('admin/pg_'.$db)->with('errore', 'Errore, riprovare');
        }
        Storage::delete($data->link);
        $fileName = $file->storeAs(env($dir),$db.'_'.$data->id.'.'.$file->extension());
        /*
        $trimmed = str_replace('/storage', '', $data->link);
        Storage::delete($trimmed);*/
        $data->link = env('STORAGE_DIR').$fileName;
    }
}
