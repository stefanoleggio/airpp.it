<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;

use Illuminate\Contracts\Queue\ShouldQueue;

class RinnovoEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $request;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->request = $request;
        $this->email = Email::where('page_id', 'rinnovo')->get();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return  $this->subject('Rinnovo airpp')->view('mails.rinnovo');
    }
}
