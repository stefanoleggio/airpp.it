<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
            [
                'page_id' => 'statuto',
                'link' => env("STORAGE_DIR").env("DOC_DIR").'/statuto_1.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'page_id' => 'home',
                'link' => env("STORAGE_DIR").env("DOC_DIR").'/home_2.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
