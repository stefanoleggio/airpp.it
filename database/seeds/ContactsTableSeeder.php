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
                'page_id' => 'segreteria',
                'name' => 'segreteria',
                'email' => 'airpp.onlus@gmail.com',
                'telefono' => '+39 049 8212237 ',
                'sede' => 'Corso Milano, 43 - 35139 PADOVA (Italy)',
            ],
            [
                'page_id' => 'segreteria-scientifica',
                'name' => 'segreteria scientifica',
                'email' => 'airpp.onlus@gmail.com',
                'telefono' => '+39 049 8212237 ',
                'sede' => 'Corso Milano, 43 - 35139 PADOVA (Italy)',
            ],
            [
                'page_id' => 'sede-legale',
                'name' => 'sede legale',
                'email' => 'airpp.onlus@gmail.com',
                'telefono' => '+39 049 8212237 ',
                'sede' => 'Corso Milano, 43 - 35139 PADOVA (Italy)',
            ]
        ]);
    }
}
