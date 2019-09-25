<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            [
                'name' => 'stefano',
                'email' => 'stefano@airpp.it',
                'password' => bcrypt('Comunismo99'),
                'role' => 'master'
            ],
            [
                'name' => 'veronica',
                'email' => 'veronica@airpp.it',
                'password' => bcrypt('1234'),
                'role' => 'user'
            ]
        ]);

    }
}
