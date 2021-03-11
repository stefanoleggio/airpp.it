<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;


class ConvegniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('convegni')->insert([
            [
                'title' => 'convegni 1',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'convegni 2',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'convegni 3',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'convegni 4',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'convegni 5',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'convegni 6',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'convegni 7',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'convegni 8',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
        ]);    }
}
