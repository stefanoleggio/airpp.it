<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team')->insert(
            [
                [
                    'team_id' => 'consiglio direttivo',
                    'name' => 'fiorella',
                    'surname' => 'calabrese',
                    'role' => 'presidente',
                    'img_path' => '/storage/team/calabrese_fiorella.jpg',
                    'description' => 'Professore Associato in Anatomia Patologica, presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari, Università degli Studi di Padova',
                ],
                [
                    'team_id' => 'consiglio direttivo',
                    'name' => 'silvia',
                    'surname' => 'tambuscio',
                    'role' => 'segretario',
                    'img_path' => '/storage/team/tambuscio_silvia.jpg',
                    'description' => 'Specialista in Medicina Legale e delle Assicurazioni.',
                ],
                [
                    'team_id' => 'consiglio direttivo',
                    'name' => 'marina',
                    'surname' => 'saetta',
                    'role' => 'consigliere',
                    'img_path' => '/storage/team/saetta_marina.jpg',
                    'description' => ' Professore Ordinario in Pneumologia presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari, Università degli Studi di Padova.',
                ],
                [
                    'team_id' => 'consiglio direttivo',
                    'name' => 'federico',
                    'surname' => 'rea',
                    'role' => 'vice presidente',
                    'img_path' => '/storage/team/rea_federico.jpg',
                    'description' => 'Professore Ordinario in Chirurgia Toracica presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari, Università degli Studi di Padova.',
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => '	elisabetta',
                    'surname' => 'balestro',
                    'img_path' => '/storage/team/balestro_elisabetta.jpg',
                    'description' => 'Dirigente medico presso l’Unità Operativa di Pneumologia.',
                    'role' => null
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => 'simonetta',
                    'surname' => 'baraldo',
                    'img_path' => '/storage/team/baraldo_simonetta.jpg',
                    'description' => 'Ricercatore Universitario presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari dell’Università degli Studi di Padova.',
                    'role' => null
                ],
            ]
    );

        DB::table('team')->insert(
            [
                [
                    'team_id' => 'consiglio direttivo',
                    'name' => 'carmelo',
                    'surname' => 'leggio',
                    'role' => 'consigliere',
                    'description' => 'Direttore Generale di Arcelor Mittal CLN Distribuzione Italia.',
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => 'aldo',
                    'surname' => 'favaretto',
                    'role' => null,
                    'description' => null
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => 'gigliola',
                    'surname' => 'lodovichetti',
                    'role' => null,
                    'description' => 'Responsabile del Laboratorio Pennelli Snc, specializzato in istopatologia e citologia diagnostica.',
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => '	giuseppe',
                    'surname' => 'marulli',
                    'role' => null,
                    'description' => 'Ricercatore Universitario presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari dell’Università degli Studi di Padova.',
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => '	emanuele ',
                    'surname' => 'cozzi',
                    'role' => null,
                    'description' => 'Responsabile della S.S.D. di Immunologia dei Trapianti dell\'Azienda Ospedaliera di Padova',
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => 'giulia',
                    'surname' => 'paolucci',
                    'role' => null,
                    'description' => 'Lavora nel settore R&D Product Development dell\'Azienda Ompi S.r.l., Piombino Dese (PD).',
                ],
                [
                    'team_id' => 'segreteria scientifica',
                    'name' => 'sergio',
                    'surname' => 'de iacovo',
                    'role' => null,
                    'description' => 'Lavora presso il dipartimento di Scienze Cardiologiche, Toraciche e Vascolari (UOC di Chirurgia Toracica). lavora presso il dipartimento di Scienze Cardiologiche, Toraciche e Vascolari (UOC di Chirurgia Toracica).',
                ],
                [
                    'team_id' => 'segreteria amministrativa',
                    'name' => 'ivana',
                    'surname' => 'piovan',
                    'role' => null,
                    'description' => null
                ],

            ]
        );
        }
}
