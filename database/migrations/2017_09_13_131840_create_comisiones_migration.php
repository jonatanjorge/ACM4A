<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComisionesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comisiones', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');
            $table->enum('turno',['mañana','tarde','noche']);
            $table->string('cuatrimestre');
            $table->string('division');

            $table->integer('carreras_id')->unsigned();
            $table->foreign('carreras_id')->references('id')->on("carreras");

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
        Schema::dropIfExists('comisiones');
    }
}
