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
            [
                'title' => 'International Workshop onThymus',
                'thb_path' => '/media/img/galleria/thb/thb_1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'II International Conference On End Stage Lung Diseases',
                'thb_path' => '/media/img/galleria/thb/thb_2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Il premio di studio “ Donato Maniscalco”',
                'thb_path' => '/media/img/galleria/thb/thb_3.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Gara di dolci',
                'thb_path' => '/media/img/galleria/thb/thb_4.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
