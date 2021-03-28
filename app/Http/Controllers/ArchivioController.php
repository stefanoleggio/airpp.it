<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Socio;

use App\Role;

use App\Category;

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

                'data' => Socio::paginate(10),
                'roles' => Role::all(),
                'categories' => Category::all()
            ]
        );
    }
}