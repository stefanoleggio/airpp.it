<?php

namespace App\Http\Controllers;

use App\Mail\TextUsSecEmail;

use App\Mail\TextUsEmail;

use App\Mail\BotEmail;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Rules\Captcha;

use Redirect;

class TextUsController extends Controller
{
    public function send(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required|email',
                'msg' => 'required',
                'privacy' => 'accepted',
                'g-recaptcha-response' => new Captcha()
            ],
            [
                'name.required' => 'Devi inserire il nome',
                'surname.required' => 'Devi inserire il cognome',
                'email.required' => 'Devi inserire l\'email',
                'email.email' => 'Devi inserire una email valida',
                'msg.required' => 'Devi inserire il messaggio',
                'privacy.accepted' => 'Devi accettare la privacy policy'
            ]);
        
        if($request->why_you_do_this != null) {
            $subject = "Bot detected";
            $message = "Bot send contact us form";
            //Mail::to(env('MAIL_DEV'))->send(new BotEmail());
            \Session::put('success', 'Messaggio inviato con successo ;)');
            return Redirect::to('/contatti');
        }

        $bl_records = DB::table('blacklist')->select('email')->get();

        foreach ($bl_records as $bl_record) {
            if(mb_strtoupper($bl_record->email) == mb_strtoupper($request->email)) {
                \Session::put('success', 'Messaggio inviato con successo ;)');
                return Redirect::to('/contatti');
            }
        }

        DB::table('messaggi')->insert(
            [
                'name' => mb_strtoupper($request->name), 
                'surname' => mb_strtoupper($request->surname),
                'email' => mb_strtoupper($request->email),
                'msg' => $request->msg,
                'date' => Carbon::now()
            ]
        );
        Mail::to(env('MAIL_SEC'))->send(new TextUsSecEmail($request));
        Mail::to($request->email)->send(new TextUsEmail($request));
        \Session::put('success', 'Messaggio inviato con successo');
        return Redirect::to('/contatti');
    }
}
