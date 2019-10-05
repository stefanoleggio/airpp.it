<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Album;
use App\Photo;
use App\Team;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function profilo()
    {
        return view('admin.profilo',
            [

                'user' => Auth::user()
            ]
        );
    }

    public function edit_profilo(Request $request){
        DB::table('users')
            ->where('id', $request->id)
            ->update(
                [
                    'name' => $request->name,
                    'email' => $request->email
                ]
            );
            \Session::put('success', 'Modifica effettuata con successo');
            return Redirect::to('admin/profilo');
    }

    public function edit_pssw(Request $request){
        $request->validate(
            [
                'password' => 'required|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
            ],
            [
                'password.required' => 'Devi inserire la password',
                'password.confirmed' => 'Le due password non corrispondono',
                'password.min' => 'La password deve essere di almeno 6 caratteri',
                'password.regex' => 'Devi rispettare i criteri della password'
            ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();
        \Session::put('success', 'Modifica effettuata con successo');
        return Redirect::to('admin/profilo');
    }

    public function donazioni()
    {
        return view('admin.donazioni',
            [

                'datas' => DB::table('donations')->where('success', '1')->get()
            ]
        );
    }

    public function iscrizioni()
    {
        return view('admin.iscrizioni');
    }

    public function messaggi()
    {
        return view('admin.messaggi',
            [

                'datas' => DB::table('emails')->get()
            ]
        );
    }

    /* Admin galleria controller */

    public function galleria()
    {
        return view('admin.galleria',
            [

                'albums' => DB::table('albums')->get()
            ]
        );
    }

    public function foto($id)
    {
        return view('admin.photos',
            [
                'album' => DB::table('albums')->where('id', $id)->get(),
                'photos' => DB::table('photos')->where('album_id', $id)->get()
            ]
        );
    }

    public function edit_album(Request $request)
    {
        $album = Album::find($request->id);
        if($request->hasFile('file')){
            $file = $request->file('file');
            if(!$this->load_album($file, $album)){
                \Session::put('error', 'Errore, riprovare');
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
        $album = new Album;
        $album->title = $request->title;
        $album->save();

        if(!$request->hasFile('file')){
            \Session::put('error', 'Errore, riprovare');
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
            \Session::put('error', 'Errore, riprovare');
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

    /**/
    
    public function team()
    {
        return view('admin.team',
            [

                'datas' => DB::table('team')->get()
            ]
        );
    }

    public function email()
    {
        return view('admin.email',
            [

                'datas' => DB::table('views')->where('page_id', 'email_iscrizioni')->orWhere('page_id', 'email_donazioni')->get()
            ]
        );
    }

    public function edit_team(Request $request)
    {
        $person = Team::find($request->id);
        $person->name = strtolower($request->name);
        $person->surname = strtolower($request->surname);
        $person->description = $request->description;
        $person->role = strtolower($request->role);
        $person->save();
        if($request->hasFile('file')){
            $file = $request->file('file');
            if($file->isValid()){
                $fileName = $file->storeAs(env('TEAM_DIR'), $request->surname."_".$request->name.".".request()->file->getClientOriginalExtension());
                $person->img_path = env('STORAGE_DIR').$fileName;
                $person->save();
            }
        }
        \Session::put('success', 'Modifica effettuata con successo');
        return Redirect::to('admin/'.$request->db);
    }

    public function premi()
    {
        return view('admin.premi',
            [
        
                'datas' => DB::table('premi')->orderBy('id', 'DESC')->get()
            ]
        );
    }

    public function convegni()
    {
        return view('admin.convegni',
            [
        
                'datas' => DB::table('convegni')->orderBy('id', 'DESC')->get()
            ]
        );
    }

    public function iniziative()
    {
        return view('admin.iniziative',
            [
        
                'datas' => DB::table('iniziative')->orderBy('id', 'DESC')->get()
            ]
        );
    }

    public function edit_news(Request $request)
    {
        if(!isset($request->active)){
            $request->active = 0;
        }else{
            $request->active = 1;
        }
        if(!isset($request->file)){
            $request->file = "0";
        }else{
            $data = DB::table($request->db)->where('id', $request->id)->get('link');
            $trimmed = str_replace('/storage', '', $data[0]->link) ;
            Storage::delete($trimmed);
            $request->file->storeAs('locandine', request()->file->getClientOriginalName());
            $request->file = '/storage/locandine/'.request()->file->getClientOriginalName();
        }
        DB::table($request->db)
            ->where('id', $request->id)
            ->update(
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'place' => $request->place,
                    'date' => $request->date,
                    'active'=> $request->active,
                    'link' => $request->file
                ]
            );
            \Session::put('success', 'Modifica effettuata con successo');
            return Redirect::to('admin/'.$request->db);
    }

    public function add_news(Request $request){
        if(!isset($request->active)){
            $request->active = 0;
        }else{
            $request->active = 1;
        }
        if (isset($request->file) && Input::file('file')->isValid())
        {
            $request->file->storeAs('locandine', request()->file->getClientOriginalName());
            $request->file = '/storage/locandine/'.request()->file->getClientOriginalName();
        }else{
            $request->file = "0";
        }
        DB::table($request->db)->insert([
            'title' => $request->title,
            'description' => $request->description,
            'place' => $request->place,
            'date' => $request->date,
            'active' => $request->active,
            'link' => $request->file
        ]);
        \Session::put('success', 'Elemento aggiunto con successo');
        return Redirect::to('admin/'.$request->db);
    }

    public function delete_news(Request $request){
        DB::table($request->db)->where('id', $request->id)->delete();
        \Session::put('success', 'Elemento eliminato con successo');
        return Redirect::to('admin/'.$request->db);
    }
}
