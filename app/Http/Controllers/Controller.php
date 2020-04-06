<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function load_file($file, &$data, $db, $dir){
        if(!$file->isValid()){
            return redirect('admin/pg_'.$db)->with('errore', 'Errore, riprovare');
        }/*
        $filename = str_replace('storage/','', $data->link);
        Storage::delete($filename);*/
        //$fileName = $file->storeAs(env($dir),$db.'_'.$data->id.'.'.$file->extension());
        $data->link = '/storage/'.$file->store(env($dir));
    }
}
