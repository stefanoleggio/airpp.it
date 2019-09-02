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
                    'description' => 'Professore Associato in Anatomia Patologica, presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari, Università degli Studi di Padova',
                    'img' => 1
                ],
                [
                    'team_id' => 'consiglio direttivo',
                    'name' => 'federico',
                    'surname' => 'rea',
                    'role' => 'vice presidente',
                    'description' => 'Professore Ordinario in Chirurgia Toracica presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari, Università degli Studi di Padova.',
                    'img' => 0
                ],
                [
                    'team_id' => 'consiglio direttivo',
                    'name' => 'Silvia',
                    'surname' => 'Tambuscio',
                    'role' => 'segretario',
                    'description' => 'Specialista in Medicina Legale e delle Assicurazioni.',
                    'img' => 0
                ],
                [
                    'team_id' => 'consiglio direttivo',
                    'name' => 'marina',
                    'surname' => 'saetta',
                    'role' => 'consigliere',
                    'description' => ' Professore Ordinario in Pneumologia presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari, Università degli Studi di Padova.',
                    'img' => 0
                ],
                [
                    'team_id' => 'consiglio direttivo',
                    'name' => 'carmelo',
                    'surname' => 'leggio',
                    'role' => 'consigliere',
                    'description' => 'Direttore Generale di Arcelor Mittal CLN Distribuzione Italia.',
                    'img' => 0
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => '	Elisabetta',
                    'surname' => 'Balestro',
                    'role' => '0',
                    'description' => 'Dirigente medico presso l’Unità Operativa di Pneumologia.',
                    'img' => 0
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => 'Simonetta',
                    'surname' => 'Baraldo',
                    'role' => '0',
                    'description' => 'Ricercatore Universitario presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari dell’Università degli Studi di Padova.',
                    'img' => 0
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => 'Aldo',
                    'surname' => 'Favaretto',
                    'role' => '0',
                    'description' => '0',
                    'img' => 0
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => 'Gigliola',
                    'surname' => 'Lodovichetti',
                    'role' => '0',
                    'description' => 'Responsabile del Laboratorio Pennelli Snc, specializzato in istopatologia e citologia diagnostica.',
                    'img' => 0
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => '	Giuseppe',
                    'surname' => 'Marulli',
                    'role' => '0',
                    'description' => 'Ricercatore Universitario presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari dell’Università degli Studi di Padova.',
                    'img' => 0
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => '	Emanuele ',
                    'surname' => 'Cozzi',
                    'role' => '0',
                    'description' => 'Responsabile della S.S.D. di Immunologia dei Trapianti dell\'Azienda Ospedaliera di Padova',
                    'img' => 0
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => 'Giulia',
                    'surname' => 'Paolucci',
                    'role' => '0',
                    'description' => 'Lavora nel settore R&D Product Development dell\'Azienda Ompi S.r.l., Piombino Dese (PD).',
                    'img' => 0
                ],
                [
                    'team_id' => 'segreteria scientifica',
                    'name' => 'Sergio',
                    'surname' => 'De Iacovo',
                    'role' => '0',
                    'description' => 'Lavora presso il dipartimento di Scienze Cardiologiche, Toraciche e Vascolari (UOC di Chirurgia Toracica). lavora presso il dipartimento di Scienze Cardiologiche, Toraciche e Vascolari (UOC di Chirurgia Toracica).',
                    'img' => 0
                ],
                [
                    'team_id' => 'segreteria amministrativa',
                    'name' => 'Ivana',
                    'surname' => 'Piovan',
                    'role' => '0',
                    'description' => '0',
                    'img' => 0
                ],

            ]
        );
        }
}
