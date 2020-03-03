<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->insert([
            [
                'page_id' => 'biobanca',
                'text' => 'Biobanca',
                'link' => 'http://www.cleup.it/new_insights_on_biobanks.html'
            ],
            [
                'page_id' => 'parlanodinoi',
                'text' => 'Fibrosi polmonare idiopatica, una settimana open-day in Veneto',
                'link' => 'http://www.nordestsanita.it/home/attualita/3648-fibrosi-polmonare-idiopatica-una-settimana-open-day-in-veneto.html'
            ]
        ]);
    }
}
