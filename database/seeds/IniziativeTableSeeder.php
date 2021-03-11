<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;


class IniziativeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iniziative')->insert([
            [
                'title' => 'iniziative 1',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'iniziative 2',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'iniziative 3',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'iniziative 4',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'iniziative 5',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'iniziative 6',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'iniziative 7',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'iniziative 8',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
        ]);
    }
}
