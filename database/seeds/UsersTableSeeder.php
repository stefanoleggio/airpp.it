<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'stefano',
            'email' => 'stefano@airpp.it',
            'password' => bcrypt('Comunismo99'),
        ]);
    }
}
