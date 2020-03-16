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
                ],
                [
                    'team_id' => 'consiglio direttivo',
                    'name' => 'silvia',
                    'surname' => 'tambuscio',
                    'role' => 'segretario',
                    'description' => 'Specialista in Medicina Legale e delle Assicurazioni.',
                ],
                [
                    'team_id' => 'consiglio direttivo',
                    'name' => 'marina',
                    'surname' => 'saetta',
                    'role' => 'consigliere',
                    'description' => ' Professore Ordinario in Pneumologia presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari, Università degli Studi di Padova.',
                ],
                [
                    'team_id' => 'consiglio direttivo',
                    'name' => 'federico',
                    'surname' => 'rea',
                    'role' => 'vice presidente',
                    'description' => 'Professore Ordinario in Chirurgia Toracica presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari, Università degli Studi di Padova.',
                ],
                [
                    'team_id' => 'consiglio direttivo',
                    'name' => 'Carmelo',
                    'surname' => 'Carmelo Leggio',
                    'role' => 'consigliere',
                    'description' => 'Ingegnere, Direttore Generale di Arcelor Mittal CLN Distribuzione Italia.',
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => '	elisabetta',
                    'surname' => 'balestro',
                    'description' => 'Dirigente medico presso l’Unità Operativa di Pneumologia.',
                    'role' => null
                ],
                [
                    'team_id' => 'comitato scientifico',
                    'name' => 'simonetta',
                    'surname' => 'baraldo',
                    'description' => 'Ricercatore Universitario presso il Dipartimento di Scienze Cardiologiche, Toraciche e Vascolari dell’Università degli Studi di Padova.',
                    'role' => null
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
                    'team_id' => 'segreteria scientifica e amministrativa',
                    'name' => 'francesca',
                    'surname' => 'lunardi',
                    'role' => null,
                    'description' => 'medico-chirurgo e biologa sanitaria, Ricercatore in Anatomia Patologica presso il Dipartimento di Scienze Cardio-Toraco-Vascolari e Sanità Pubblica, Università degli Studi di Padova.',
                ],
                [
                    'team_id' => 'comitato eventi',
                    'name' => 'francesca',
                    'surname' => 'lunardi',
                    'role' => null,
                    'description' => 'medico-chirurgo e biologa sanitaria, Ricercatore in Anatomia Patologica presso il Dipartimento di Scienze Cardio-Toraco-Vascolari e Sanità Pubblica, Università degli Studi di Padova.',
                ],
                [
                    'team_id' => 'comitato eventi',
                    'name' => 'gigliola',
                    'surname' => 'lodovichetti',
                    'role' => null,
                    'description' => 'Responsabile del Laboratorio Pennelli Snc, specializzato in istopatologia e citologia diagnostica.',
                ],
                [
                    'team_id' => 'comitato etico',
                    'name' => 'manlio',
                    'surname' => 'dagostini',
                    'role' => null,
                    'description' => null
                ],
                [
                    'team_id' => 'comitato etico',
                    'name' => 'elena',
                    'surname' => 'ballarin',
                    'role' => null,
                    'description' => null
                ],
            ]
        );
    }
}
