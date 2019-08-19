<?php

use Illuminate\Database\Seeder;

class EmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emails')->insert(
            [
            'scope_id' => 'donation',
            'object' => 'Donazione',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa molestias labore blanditiis cum odio quidem ab aliquam non dolores voluptatem, aliquid veniam amet sint, beatae aspernatur repellendus aut nihil reprehenderit.'
            ]
        );
    }
}
