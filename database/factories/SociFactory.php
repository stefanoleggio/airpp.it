<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Socio;
use Faker\Generator as Faker;

$factory->define(Socio::class, function (Faker $faker) {
    return [
        'numero_socio' => Str::random(10),
        'categoria' => Str::random(10),
        'nome' => $faker->name,
        'cognome' => Str::random(10),
        'via' => Str::random(10),
        'civico' => Str::random(10),
        'cap' => Str::random(10),
        'comune' => Str::random(10),
        'provincia' => Str::random(10),
        'codice_fiscale' => Str::random(10),
        'ruolo' => Str::random(10),
        'email' => $faker->email,
        'cellulare' => Str::random(10),
        'telefono' => Str::random(10),
        'ultimo_anno_pagato' => Str::random(10),
        'escluso' => 0
    ];
});
