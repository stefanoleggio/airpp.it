<?php

use Illuminate\Database\Seeder;

class MsgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('msgs')->insert(
            [
                'scope_id' => 'donation__info',
                'title' => ' Perchè ti chiediamo i dati? ',
                'content' => 'I dati che ci invierai saranno utilizzati solamente per emettere regolare fattura e inviarti una mail di ringraziamento '
            ]
        );
    }
}
