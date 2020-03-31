<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            [
                'page_id' => 'telefono',
                'title' => 'Telefono',
                'description' => '+39 049 8212237 '
            ],
            [
                'page_id' => 'email',
                'title' => 'Email',
                'description' => 'airpp.onlus@gmail.com '
            ],
            [
                'page_id' => 'sede',
                'title' => 'Indirizzo',
                'description' => 'Corso Milano, 43 - 35139 PADOVA (Italy)'
            ],
            [
                'page_id' => 'contacts_cd',
                'title' => 'Fiorella calabrese',
                'description' => 'fiorella.calabrese@unipd.it'
            ],
            [
                'page_id' => 'contacts_cd',
                'title' => 'Fiorella calabrese',
                'description' => 'fiorella.calabrese@unipd.it'
            ],
            [
                'page_id' => 'contacts_cd',
                'title' => 'Fiorella calabrese',
                'description' => 'fiorella.calabrese@unipd.it'
            ],
            [
                'page_id' => 'contacts_cs',
                'title' => 'Prova',
                'description' => 'email'
            ]
        ]);
    }
}
