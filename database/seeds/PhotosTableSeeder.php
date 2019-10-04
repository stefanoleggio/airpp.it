<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            [
                'album_id' => '2',
                'img_path' => '/media/img/galleria/album_2/2_1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'album_id' => '2',
                'img_path' => '/media/img/galleria/album_2/2_2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'album_id' => '2',
                'img_path' => '/media/img/galleria/album_2/2_3.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
