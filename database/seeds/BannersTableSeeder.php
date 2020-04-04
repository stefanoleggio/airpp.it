<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert(
            [
                [
                    'id' => 1,
                    'page_id' => "home",
                    'title' => "Ricerca",
                    'description' => "Sosteniamo la ricerca scientifica istituendo borse e premi di studio a favore di ricercatori meritevoli favorendone l’inserimento negli ambiti ospedaliero e universitario per una ricerca scientifica sempre più qualificata e che approfondisca anche le patologie polmonari più rare.",
                    'img' => "/media/svg/home_science.svg"
                ],
                [
                    'id' => 2,
                    'page_id' => "home",
                    'title' => "Istruzione",
                    'description' => "Partecipiamo ed organizziamo convegni scientifici, corsi, attività di formazione professionale, progetti educativi scolastici ed extrascolastici per favorire l’approfondimento tecnico e divulgare la conoscenza delle patologie polmonari a specialisti e non.",
                    'img' => "/media/svg/home_teaching.svg"
                ],
                [
                    'id' => 3,
                    'page_id' => "home",
                    'title' => "Supporto",
                    'description' => "Aspiriamo a diventare un punto di riferimento per i pazienti, ed i loro familiari, affetti da queste patologie per informazioni e consigli sulla cura delle patologie polmonari.",
                    'img' => "/media/svg/home_gradma.svg"
                ],
                [
                    'id' => 4,
                    'page_id' => "convegni",
                    'title' => "Convegni",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum omnis, aliquam voluptate rerum, quibusdam vero cumque doloribus dolores, ullam voluptates eligendi adipisci minima quo obcaecati labore ex ad est illum.",
                    'img' => "/media/svg/news_conferencespeaker.svg"
                ],
                [
                    'id' => 5,
                    'page_id' => "premi",
                    'title' => "Premi",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum omnis, aliquam voluptate rerum, quibusdam vero cumque doloribus dolores, ullam voluptates eligendi adipisci minima quo obcaecati labore ex ad est illum.",
                    'img' => "/media/svg/news_winners.svg"
                ],
                [
                    'id' => 6,
                    'page_id' => "iniziative",
                    'title' => "Iniziative",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum omnis, aliquam voluptate rerum, quibusdam vero cumque doloribus dolores, ullam voluptates eligendi adipisci minima quo obcaecati labore ex ad est illum.",
                    'img' => "/media/svg/news_creationprocess.svg"
                ],
                [
                    'id' => 7,
                    'page_id' => "donazioni",
                    'title' => "Donazioni",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum omnis, aliquam voluptate rerum, quibusdam vero cumque doloribus dolores, ullam voluptates eligendi adipisci minima quo obcaecati labore ex ad est illum.",
                    'img' => "/media/svg/associazione_awholeyear.svg"
                ],
                [
                    'id' => 8,
                    'page_id' => "associarsi",
                    'title' => "Associarsi",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum omnis, aliquam voluptate rerum, quibusdam vero cumque doloribus dolores, ullam voluptates eligendi adipisci minima quo obcaecati labore ex ad est illum.",
                    'img' => "/media/svg/associazione_agreement.svg"
                ],
                [
                    'id' => 9,
                    'page_id' => "statuto",
                    'title' => "Statuto",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum omnis, aliquam voluptate rerum, quibusdam vero cumque doloribus dolores, ullam voluptates eligendi adipisci minima quo obcaecati labore ex ad est illum.",
                    'img' => "/media/svg/associazione_reading_list.svg"
                ],
                [
                    'id' => 10,
                    'page_id' => "contatti",
                    'title' => "Contatti",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum omnis, aliquam voluptate rerum, quibusdam vero cumque doloribus dolores, ullam voluptates eligendi adipisci minima quo obcaecati labore ex ad est illum.",
                    'img' => "/media/svg/contatti_mail_box.svg"
                ],
                [
                    'id' => 11,
                    'page_id' => "galleria",
                    'title' => "Galleria",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum omnis, aliquam voluptate rerum, quibusdam vero cumque doloribus dolores, ullam voluptates eligendi adipisci minima quo obcaecati labore ex ad est illum.",
                    'img' => "/media/svg/gallery_camera.svg"
                ],
                [
                    'id' => 12,
                    'page_id' => "bilanci",
                    'title' => "Bilanci",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum omnis, aliquam voluptate rerum, quibusdam vero cumque doloribus dolores, ullam voluptates eligendi adipisci minima quo obcaecati labore ex ad est illum.",
                    'img' => "/media/svg/bilanci.svg"
                ],
                [
                    'id' => 13,
                    'page_id' => "biobanca",
                    'title' => "Biobanca",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum omnis, aliquam voluptate rerum, quibusdam vero cumque doloribus dolores, ullam voluptates eligendi adipisci minima quo obcaecati labore ex ad est illum.",
                    'img' => "/media/svg/biobanca.svg"
                ],
                [
                    'id' => 14,
                    'page_id' => "parlanodinoi",
                    'title' => "Parlano di noi",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum omnis, aliquam voluptate rerum, quibusdam vero cumque doloribus dolores, ullam voluptates eligendi adipisci minima quo obcaecati labore ex ad est illum.",
                    'img' => "/media/svg/parlanodinoi.svg"
                ],
                [
                    'id' => 15,
                    'page_id' => "articoli",
                    'title' => "Articoli",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum omnis, aliquam voluptate rerum, quibusdam vero cumque doloribus dolores, ullam voluptates eligendi adipisci minima quo obcaecati labore ex ad est illum.",
                    'img' => "/media/svg/articoli.svg"
                ],
                [
                    'id' => 16,
                    'page_id' => "cookie",
                    'title' => "Cookie",
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum omnis, aliquam voluptate rerum, quibusdam vero cumque doloribus dolores, ullam voluptates eligendi adipisci minima quo obcaecati labore ex ad est illum.",
                    'img' => "/media/svg/cookies.svg"
                ],
                [
                    'id' => 17,
                    'page_id' => "costruction",
                    'title' => "Pagina in costruzione",
                    'description' => "La pagina non è al momento disponibile, ci stiamo lavorando!",
                    'img' => "/media/svg/costruction.svg"
                ],
                [
                    'id' => 18,
                    'page_id' => "organisociali",
                    'title' => "Organi sociali",
                    'description' => "descrizione",
                    'img' => "/media/svg/organisociali.svg"
                ]
            ]
        );
    }
}
