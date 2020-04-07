<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Link;

class AdminLinksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
}
