<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slide;

use Redirect;

use Illuminate\Support\Facades\Storage;

class AdminSliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.slider',
            [

                'slides' => Slide::orderBy('num')->paginate(20)
            ]
        );
    }

    public function getLast()
    {
        return Slide::where('id_succ', null)->get();
    }

    public function addLast(Slide $slide)
    {
        $last = Slide::where('id_succ', null)->first();
        if($last == null || $last->id == $slide->id){
            $slide->id_succ = null;
            $slide->id_prev = null;
            $slide->num = 1;
            $slide->save();
        } else {
            $q = Slide::where('id_succ', null)->first();
            $slide->id_succ = null;
            $slide->id_prev = $q->id;
            $slide->num = $q->num + 1;
            $slide->save();
            $q->id_succ = $slide->id;
            $q->save();
        }
    }

    public function delete(Request $request)
    {
        $slide = Slide::where('id', $request->id)->first();
        $prev = $slide->id_prev;
        $succ = $slide->id_succ;
        if($prev != null) {
            $slide_prev = Slide::where('id', $prev)->first();
            $slide_prev->id_succ = $succ;
            $slide_prev->save();
        }
        if($succ != null) {
            $slide_succ = Slide::where('id', $succ)->first();
            $slide_succ->id_prev = $prev;
            $slide_succ->save();
        }
        if($slide->tipo=="2") {
            $trimmed = str_replace('/storage', '', $slide->img);
            Storage::delete($trimmed);
        }
        $slide->delete();
        $slides = Slide::get();
        foreach($slides as  $s ){
            if($s->num > $slide->num) {
                $s->num = $s->num - 1;
                $s->save();
            }
        }
        \Session::put('success', 'Elemento eliminato con successo');
        return Redirect::to('admin/slider');
    }

    public function edit(Request $request)
    {
        $slide = Slide::where('id', $request->id)->first();
        if($slide->tipo == "1") {
            $request->validate(
                [
                    'descrizione' => 'required',
                ],
                [
                    'descrizione.required' => 'La descrizione è richiesta',
                ]);
            $slide->titolo = $request->titolo;
            $slide->descrizione = $request->descrizione;
            $slide->link_txt = $request->link_txt;
            $slide->link = $request->link;
            $slide->save();
        } else {
            $slide->link = $request->link;
            $slide->save();
            if($request->hasFile('img')) {
                $file = $request->file('img');
                if(!$file->isValid()){
                    return redirect('admin/slider')->with('errore', 'Errore, riprovare');
                }
                $filename = 'storage/'.$file;
                Storage::delete($filename);
                $fileName = $file->storeAs(env('SLIDES_DIR'),'slides'.'_'.$slide->id.'.'.$file->extension());
                $slide->img = env('STORAGE_DIR').$fileName;
                $this->addLast($slide);
            }
            $this->addLast($slide);
            
        }

        \Session::put('success', 'Modifica effettuata con successo');
        return Redirect::to('admin/slider');
    }

    public function add_txt(Request $request)
    {
        $request->validate(
            [
                'descrizione' => 'required',
            ],
            [
                'descrizione.required' => 'La descrizione è richiesta',
            ]);

        $slide = new Slide;
        $slide->tipo = '1';
        $slide->titolo = $request->titolo;
        $slide->descrizione = $request->descrizione;
        $slide->link_txt = $request->link_txt;
        $slide->link = $request->link;
        $this->addLast($slide);
        \Session::put('success', 'Elemento aggiunto con successo');
        return Redirect::to('admin/slider');
    }

    public function add_img(Request $request)
    {
        $request->validate(
            [
                'img' => 'required',
            ],
            [
                'img.required' => 'L\'immagine è richiesta',
            ]);

        $slide = new Slide;
        $slide->tipo = '2';
        $slide->link = $request->link;
        $file = $request->file('img');
        if(!$file->isValid()){
            return redirect('admin/slider')->with('errore', 'Errore, riprovare');
        }
        $slide->save();
        $filename = 'storage/'.$file;
        Storage::delete($filename);
        $fileName = $file->storeAs(env('SLIDES_DIR'),'slides'.'_'.$slide->id.'.'.$file->extension());
        $slide->img = env('STORAGE_DIR').$fileName;
        $this->addLast($slide);
        $slide->save();
        \Session::put('success', 'Elemento aggiunto con successo');
        return Redirect::to('admin/slider');
    }

public function up(Request $request) {
    $slide = Slide::where('id', $request->id)->first();
    if($slide->id_prev != null) {
        $slide_prev = Slide::where('id', $slide->id_prev)->first();
        $tmp_succ = Slide::where('id', $slide->id_succ)->first();
        $tmp_prev = Slide::where('id', $slide_prev->id_prev)->first();
        $num = $slide->num;

        $slide->id_prev = $slide_prev->id_prev;
        $slide_prev->id_succ = $slide->id_succ;
        $slide->id_succ = $slide_prev->id;
        $slide_prev->id_prev = $slide->id;
        $slide->num = $slide_prev->num;
        $slide_prev->num = $num;

        if($tmp_succ != null) {
            $tmp_succ->id_prev = $slide_prev->id;
            $tmp_succ->save();
        }
        if($tmp_prev != null) {
            $tmp_prev->id_succ = $slide->id;
            $tmp_prev->save();
        }
        
        $slide->save();
        $slide_prev->save();
    }
    return Redirect::to('admin/slider');
}

public function down(Request $request) {
    $slide = Slide::where('id', $request->id)->first();
    if($slide->id_succ != null) {
        $slide_succ = Slide::where('id', $slide->id_succ)->first();
        $tmp_succ = Slide::where('id', $slide_succ->id_succ)->first();
        $tmp_prev = Slide::where('id', $slide->id_prev)->first();
        $num = $slide->num;

        $slide->id_succ = $slide_succ->id_succ;
        $slide_succ->id_succ = $slide->id;
        $slide_succ->id_prev = $slide->id_prev;
        $slide->id_prev = $slide_succ->id;
        $slide->num = $slide_succ->num;
        $slide_succ->num = $num;


        if($tmp_succ != null) {
            $tmp_succ->id_prev = $slide->id;
            $tmp_succ->save();
        }
        if($tmp_prev != null) {
            $tmp_prev->id_succ = $slide_succ->id;
            $tmp_prev->save();
        }

        $slide->save();
        $slide_succ->save();
    }
    return Redirect::to('admin/slider');
}

}
