<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('num')->nullable();
            $table->integer('id_prev')->nullable();
            $table->integer('id_succ')->nullable();
            $table->integer('tipo');
            $table->string('titolo')->nullable();
            $table->longText('descrizione')->nullable();
            $table->string('link')->nullable();
            $table->string('link_txt')->nullable();
            $table->string('img')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slides');
    }
}
