<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIscrizioniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iscrizioni', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('paymentID');
            $table->string('name');
            $table->string('surname');
            $table->string('cf');
            $table->string('cap');
            $table->string('comune');
            $table->string('via');
            $table->string('civico');
            $table->string('provincia');
            $table->string('email');
            $table->string('telefono');
            $table->integer('amount');
            $table->boolean('success');
            $table->dateTime('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iscrizioni');
    }
}
