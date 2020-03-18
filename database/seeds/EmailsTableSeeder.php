<?php

use Illuminate\Database\Seeder;

class EmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emails')->insert([
            [
                'page_id' => 'iscrizione',
                'title' => 'Grazie per la tua iscrizione',
                'description' => 'A breve verrai contattato per essere ringraziato'
            ],
            [
                'page_id' => 'donazione',
                'title' => 'Grazie per la tua donazione',
                'description' => 'A breve verrai contattato per essere ringraziato'
            ]
        ]);
    }
}
