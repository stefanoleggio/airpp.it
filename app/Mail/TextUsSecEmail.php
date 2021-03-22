<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class TextUsSecEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Object $request)
    {
        $this->request = $request;
        $request->date = Carbon::now();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Messaggio'." da ".mb_strtoupper($this->request->name)." ".mb_strtoupper($this->request->surname))->view('mails.textus_sec');
    }
}
