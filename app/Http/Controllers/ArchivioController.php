<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Socio;

class ArchivioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin.archivio',
            [

                'data' => Socio::paginate(10)
            ]
        );
    }
}