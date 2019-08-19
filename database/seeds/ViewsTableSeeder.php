<?php

use Illuminate\Database\Seeder;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('views')->insert(
            [
                [
                    'page_id' => "donations",
                    'title' => "Bonifico bancario",
                    'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus suscipit nihil veniam dolorem numquam dignissimos exercitationem, omnis quia, quod asperiores nostrum reiciendis eaque, maiores distinctio ipsam laborum beatae ipsum nam."
                ],
                [
                    'page_id' => "donations",
                    'title' => "5XMille",
                    'content' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus suscipit nihil veniam dolorem numquam dignissimos exercitationem, omnis quia, quod asperiores nostrum reiciendis eaque, maiores distinctio ipsam laborum beatae ipsum nam."
                ]
            ]
        );
    }
}
