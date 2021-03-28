<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'VOLONTARIO',
            ],
            [
                'name' => 'COMITATO SCIENTIFICO',
            ],
            [
                'name' => 'COMITATO ETICO',
            ],
            [
                'name' => 'TESORIERE',
            ],
            [
                'name' => 'SEGRETERIA SCIENTIFICA',
            ],
            [
                'name' => 'REVISORE DEI CONTI',
            ],
            [
                'name' => 'SEGRETARIO',
            ],
            [
                'name' => 'VICEPRESIDENTE',
            ]
        ]);
    }
}
