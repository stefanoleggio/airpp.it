<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;

use Illuminate\Console\Command;

class WeeklyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weekly:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weekly update of airpp.it status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Mail::raw('Airpp.it website is fine!', function($message)
        {
            $message->subject("airpp.it weekly update");
            $message->from('airpp.website@gmail.com', 'Airpp');
            $message->to('airpp.website@gmail.com');
        });
    }
}
