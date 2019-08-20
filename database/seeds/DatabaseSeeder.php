<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BannersTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(ImgTableSeeder::class);
        $this->call(ViewsTableSeeder::class);
        $this->call(EmailsTableSeeder::class);
        $this->call(MsgsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
