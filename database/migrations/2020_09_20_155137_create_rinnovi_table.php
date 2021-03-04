<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRinnoviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rinnovi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('paymentID');
            $table->string('cf');
            $table->string('email');
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
        Schema::dropIfExists('rinnovi');
    }
}
