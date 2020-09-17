<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;

use Redirect;

use Illuminate\Support\Facades\Storage;

class AdminTeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.team',
            [

                'datas' => Team::paginate(10)
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
        $person->name = $request->name;
        $person->surname = $request->surname;
        $person->description = $request->description;
        $person->role = strtolower($request->role);
        $person->save();
        if($request->hasFile('file') && $request->checkbox == null){
            $file = $request->file('file');
            $this->load_thb($file, $person, "team", "TEAM_DIR");
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

    public function add(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'surname' => 'required',
                'team_id' => 'required'
            ],
            [
                'name.required' => 'Il nome è richiesto',
                'surname.required' => 'Il cognome è richiesto'
            ]);

        $team_id_trimmed = strtolower($request->team_id);
        
        switch($team_id_trimmed){
            case "consiglio direttivo":
                $team_id = "consiglio direttivo";
                break;
            case "segreteria scientifica e amministrativa":
                $team_id = "segreteria scientifica e amministrativa";
                break;
            case "comitato etico":
                $team_id = "comitato etico";
                break;
            case "comitato eventi":
                $team_id = "comitato eventi";
                break;
            case "comitato scientifico":
                $team_id = "comitato scientifico";
                break;
            case "collegio dei revisori dei conti":
                $team_id = "collegio dei revisori dei conti";
                break;
            default:
                \Session::put('error', 'Devi inserire un identificativo valido');
                return Redirect::to('admin/team');
        }
        $person = new Team;
        $person->team_id = $team_id;
        $person->name = $request->name;
        $person->surname = $request->surname;
        $person->description = $request->description;
        $person->role = strtolower($request->role);
        $person->save();
        if($request->hasFile('file') && $request->checkbox == null){
            $file = $request->file('file');
            $this->load_thb($file, $person, "team", "TEAM_DIR");
        }else{
            $person->img_path = env('STORAGE_DIR').'team/default.svg';
        }
        $person->save();
        \Session::put('success', 'Elemento aggiunto con successo');
        return Redirect::to('admin/team');
    }

    public function delete(Request $request)
    {   
        $person = Team::find($request->id);
        $filename = str_replace('storage/','', $person->img_path);
        if($filename != '/team/default.svg'){
            Storage::delete($filename);
        }
        $person->delete();
        \Session::put('success', 'Elemento eliminato con successo');
        return Redirect::to('admin/team');
    }

    public function load_thb($file, &$data, $db, $dir){
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
