<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSociTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soci', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_socio')->nullable();
            $table->string('categoria')->nullable();
            $table->string('nome')->nullable();
            $table->string('cognome')->nullable();
            $table->string('via')->nullable();
            $table->string('civico')->nullable();
            $table->string('cap')->nullable();
            $table->string('comune')->nullable();
            $table->string('provincia')->nullable();
            $table->string('codice_fiscale')->nullable();
            $table->string('ruolo')->nullable();
            $table->string('email')->nullable();
            $table->string('cellulare')->nullable();
            $table->string('telefono')->nullable();
            $table->string('anno_iscrizione')->nullable();
            $table->string('ultimo_anno_pagato')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soci');
    }
}
