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
                    'page_id' => "donazioni",
                    'title' => "donazioni online",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus suscipit nihil veniam dolorem numquam dignissimos exercitationem, omnis quia, quod asperiores nostrum reiciendis eaque, maiores distinctio ipsam laborum beatae ipsum nam."
                ],
                [
                    'page_id' => "donazioni",
                    'title' => "Bonifico bancario",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus suscipit nihil veniam dolorem numquam dignissimos exercitationem, omnis quia, quod asperiores nostrum reiciendis eaque, maiores distinctio ipsam laborum beatae ipsum nam."
                ],
                [
                    'page_id' => "donazioni",
                    'title' => "5XMille",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus suscipit nihil veniam dolorem numquam dignissimos exercitationem, omnis quia, quod asperiores nostrum reiciendis eaque, maiores distinctio ipsam laborum beatae ipsum nam."
                ],
                [
                    'page_id' => "associarsi",
                    'title' => "iscrizione online",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus suscipit nihil veniam dolorem numquam dignissimos exercitationem, omnis quia, quod asperiores nostrum reiciendis eaque, maiores distinctio ipsam laborum beatae ipsum nam."
                ],
                [
                    'page_id' => "associarsi",
                    'title' => "procedura alternativa",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus suscipit nihil veniam dolorem numquam dignissimos exercitationem, omnis quia, quod asperiores nostrum reiciendis eaque, maiores distinctio ipsam laborum beatae ipsum nam."
                ],
                [
                    'page_id' => "email_donazioni",
                    'title' => "donazione",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus suscipit nihil veniam dolorem numquam dignissimos exercitationem, omnis quia, quod asperiores nostrum reiciendis eaque, maiores distinctio ipsam laborum beatae ipsum nam."
                ],
                [
                    'page_id' => "email_iscrizioni",
                    'title' => "iscrizione",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus suscipit nihil veniam dolorem numquam dignissimos exercitationem, omnis quia, quod asperiores nostrum reiciendis eaque, maiores distinctio ipsam laborum beatae ipsum nam."
                ],
                [
                    'page_id' => "home",
                    'title' => "Associazione italiana ricerca patologie polmonari",
                    'description' => "L’ A.I.R.P.P. nasce a Padova grazie ad un gruppo di ricercatori, affermati a livello internazionale, impegnati da anni nello studio delle patologie polmonari, neoplastiche e non, con disfunzioni anche severe destinate a trapianto d’organo."
                ],
                [
                    'page_id' => "parlanodinoi",
                    'title' => 'Parlano di noi',
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus suscipit nihil veniam dolorem numquam dignissimos exercitationem, omnis quia, quod asperiores nostrum reiciendis eaque, maiores distinctio ipsam laborum beatae ipsum nam."
                ],
                [
                    'page_id' => "articoli",
                    'title' => 'Articoli',
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus suscipit nihil veniam dolorem numquam dignissimos exercitationem, omnis quia, quod asperiores nostrum reiciendis eaque, maiores distinctio ipsam laborum beatae ipsum nam."
                ],
                [
                    'page_id' => "biobanca",
                    'title' => 'Biobanca',
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus suscipit nihil veniam dolorem numquam dignissimos exercitationem, omnis quia, quod asperiores nostrum reiciendis eaque, maiores distinctio ipsam laborum beatae ipsum nam."
                ]
            ]
        );
    }
}
