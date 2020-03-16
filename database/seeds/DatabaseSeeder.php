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
        $this->call(ViewsTableSeeder::class);
        $this->call(MsgsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(LinksTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
    }
}
