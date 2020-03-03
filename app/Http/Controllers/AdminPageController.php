<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Redirect;

use Illuminate\Support\Facades\Storage;

use App\Banner;

use App\View;

use App\Document;

use App\Link;

use App\Bilanci;

class AdminPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pg_home(){
        return view('admin.pg_home',
            [
                'banners' => Banner::where('page_id', 'home')->get(),
                'views' => View::where('page_id', 'home')->get(),
                'datas' => Document::where('page_id', 'home')->get()
            ]
        );
    }

    public function pg_donazioni(){
        return view('admin.pg_donazioni',
            [
                'banners' => Banner::where('page_id', 'donazioni')->get(),
                'views' => View::where('page_id', 'donazioni')->get()
            ]
        );
    }
    
    public function pg_associarsi(){
        return view('admin.pg_associarsi',
            [
                'banners' => Banner::where('page_id', 'associarsi')->get(),
                'views' => View::where('page_id', 'associarsi')->get(),
                'datas' => Document::where('page_id', 'associarsi')->get()
            ]
        );
    }

    public function pg_galleria(){
        return view('admin.pg_galleria',
            [
                'banners' => Banner::where('page_id', 'galleria')->get()
            ]
        );
    }

    public function pg_statuto(){
        return view('admin.pg_statuto',
            [
                'banners' => Banner::where('page_id', 'statuto')->get(),
                'datas' => Document::where('page_id', 'statuto')->get()
            ]
        );
    }

    public function pg_bilanci(){
        return view('admin.pg_bilanci',
            [
                'banners' => Banner::where('page_id', 'bilanci')->get(),
                'datas' => Bilanci::orderBy('id', 'desc')->get()
            ]
        );
    }

    public function pg_biobanca(){
        return view('admin.pg_biobanca',
            [
                'banners' => Banner::where('page_id', 'biobanca')->get(),
                'views' => View::where('page_id', 'biobanca')->get()
            ]
        );
    }

    public function pg_parlanodinoi(){
        return view('admin.pg_parlanodinoi',
            [
                'banners' => Banner::where('page_id', 'parlanodinoi')->get(),
                'links' => Link::where('page_id', 'parlanodinoi')->get()
            ]
        );
    }

    public function pg_articoli(){
        return view('admin.pg_articoli',
            [
                'banners' => Banner::where('page_id', 'articoli')->get(),
                'views' => View::where('page_id', 'articoli')->get()
            ]
        );
    }

    public function pg_cookies(){
        return view('admin.pg_cookies',
            [
                'banners' => Banner::where('page_id', 'cookies')->get()
            ]
        );
    }

    public function pg_attivita(){
        return view('admin.pg_attivita',
            [
                'in' => Banner::where('page_id', 'iniziative')->get(),
                'pr' => Banner::where('page_id', 'premi')->get(),
                'co' => Banner::where('page_id', 'convegni')->get()
            ]
        );
    }

    public function pg_segnalazioni(){
        return view('admin.pg_segnalazioni',
            [
                'banners' => Banner::where('page_id', 'segnalazioni')->get()
            ]
        );
    }

    public function pg_contatti(){
        return view('admin.pg_contatti',
            [
                'banners' => Banner::where('page_id', 'contatti')->get()
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

    public function edit_links(Request $request){
        $request->validate(
            [
                'text' => 'required',
                'link' => 'required'
            ],
            [
                'text.required' => 'Il testo è richiesto',
                'link.required' => 'Il link è richiesto'
            ]);
        DB::table('links')
        ->where('id', $request->id)
        ->update(
            [
                'text' => $request->text,
                'link' => $request->link
            ]
        );
        return redirect('admin/pg_'.$request->db)->with('success', 'Elemento modificato con successo');
    }

    public function add_links(Request $request){
        $request->validate(
            [
                'text' => 'required',
                'link' => 'required'
            ],
            [
                'text.required' => 'Il testo è richiesto',
                'link.required' => 'Il link è richiesto'
            ]);
        $link = new Link;
        $link->text = $request->text;
        $link->link = $request->link;
        $link->page_id = $request->page_id;
        $link->save();
        return redirect('admin/pg_'.$request->db)->with('success', 'Elemento modificato con successo');
    }

    public function delete_links(Request $request){
        $link  = Link::find($request->id);
        $link->delete();
        return redirect('admin/pg_'.$request->db)->with('success', 'Elemento eliminato con successo');
    }

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

    public function load_file($file, &$data, $db, $dir){
        if(!$file->isValid()){
            return redirect('admin/pg_'.$db)->with('errore', 'Errore, riprovare');
        }
        $filename = str_replace('storage/','', $data->link);
        Storage::delete($filename);
        $fileName = $file->storeAs(env($dir),$db.'_'.$data->id.'.'.$file->extension());
        $data->link = env('STORAGE_DIR').$fileName;
    }
}
