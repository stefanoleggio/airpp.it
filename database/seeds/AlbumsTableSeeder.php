<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            'title' => 'Titolo',
            'description' => 'descrizione',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
