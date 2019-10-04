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
        $this->call(ImgTableSeeder::class);
        $this->call(ViewsTableSeeder::class);
        $this->call(MsgsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(AlbumsTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
    }
}
