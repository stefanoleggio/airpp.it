<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PayPal\Api\RedirectUrls;
use Redirect;


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

    public function premi()
    {
        return view('admin.premi',
            [
        
                'datas' => DB::table('premi')->get()
            ]
        );
    }

    public function convegni()
    {
        return view('admin.convegni',
            [
        
                'datas' => DB::table('convegni')->get()
            ]
        );
    }

    public function iniziative()
    {
        return view('admin.iniziative',
            [
        
                'datas' => DB::table('iniziative')->get()
            ]
        );
    }

    public function pagine()
    {
        return view('admin.pagine');
    }

    public function componenti()
    {
        return view('admin.componenti');
    }

    public function edit_news(Request $request)
    {
        if(!isset($request->active)){
            $request->active = 0;
        }else{
            $request->active = 1;
        }
        DB::table($request->db)
            ->where('id', $request->id)
            ->update(
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'place' => $request->place,
                    'date' => $request->date,
                    'active'=> $request->active
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
        DB::table($request->db)->insert([
            'title' => $request->title,
            'description' => $request->description,
            'place' => $request->place,
            'date' => $request->date,
            'active' => $request->active
        ]);
        \Session::put('success', 'Elemento aggiunto con successo');
        return Redirect::to('admin/'.$request->db);
    }

    public function delete_news(Request $request){
        DB::table($request->db)::where('id', $request->id)->delete();
        \Session::put('success', 'Elemento eliminato con successo');
        return Redirect::to('admin/'.$request->db);
    }
}
