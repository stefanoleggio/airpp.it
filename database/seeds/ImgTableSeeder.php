<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ImgTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('img')->insert([
            'img' => '/media/img/home.jpg',
            'page_id' => 'home',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
