<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;

use Redirect;

use Illuminate\Support\Facades\Storage;

class AdminTeamController extends Controller
{

    public function index()
    {
        return view('admin.team',
            [

                'datas' => Team::all()
            ]
        );
    }

    public function edit(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'surname' => 'required',
                'file' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ],
            [
                'name.required' => 'Il nome è richiesto',
                'surname.required' => 'Il cognome è richiesto'
            ]);
        $person = Team::find($request->id);
        $person->name = strtolower($request->name);
        $person->surname = strtolower($request->surname);
        $person->description = $request->description;
        $person->role = strtolower($request->role);
        $person->save();
        if($request->hasFile('file') && $request->checkbox == null){
            $file = $request->file('file');
            $this->load_file($file, $person, "team", "TEAM_DIR");
            $person->save();
        }
        if($request->checkbox != null){
            $filename = str_replace('storage/','', $person->img_path);
            if($filename != '/team/default.svg'){
                Storage::delete($filename);
            }
            $person->img_path = env('STORAGE_DIR').'team/default.svg';
            $person->save();
        }
        \Session::put('success', 'Modifica effettuata con successo');
        return Redirect::to('admin/'.$request->db);
    }

    public function load_file($file, &$data, $db, $dir){
        if(!$file->isValid()){
            return redirect('admin/team')->with('errore', 'Errore, riprovare');
        }
        $filename = str_replace('storage/','', $data->img_path);
        if($filename != '/team/default.svg'){
            Storage::delete($filename);
        }
        $fileName = $file->storeAs(env($dir),$db.'_'.$data->id.'.'.$file->extension());
        $data->img_path = env('STORAGE_DIR').$fileName;
    }
}
