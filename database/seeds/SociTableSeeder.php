<?php

use App\Socio;

use Illuminate\Database\Seeder;

class SociTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Socio::class, 50)->create();
    }
}
