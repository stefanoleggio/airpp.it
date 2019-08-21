<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use Faker\Factory as Faker;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,4) as $index) {
	        DB::table('convegni')->insert([
	            'title' => $faker->name,
	            'description' => $faker->paragraph,
                'place' => $faker->city,
                'date' => $faker->date('Y-m-d'),
                'active' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::table('iniziative')->insert([
	            'title' => $faker->name,
	            'description' => $faker->paragraph,
                'place' => $faker->city,
                'date' => $faker->date('Y-m-d'),
                'active' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
	        ]);
	    }
    }
}
