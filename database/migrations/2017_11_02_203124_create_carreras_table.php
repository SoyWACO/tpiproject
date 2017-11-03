<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        // Relación muchos a muchos: proyecto_carrera
        Schema::create('proyecto_carrera', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proyecto')->unsigned();
            $table->integer('id_carrera')->unsigned();

            $table->foreign('id_proyecto')->references('id')->on('proyectos');
            $table->foreign('id_carrera')->references('id')->on('carreras');

            $table->timestamps();
        });

        // Relación muchos a muchos: pasantia_carrera
        Schema::create('pasantia_carrera', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pasantia')->unsigned();
            $table->integer('id_carrera')->unsigned();

            $table->foreign('id_pasantia')->references('id')->on('pasantias');
            $table->foreign('id_carrera')->references('id')->on('carreras');

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
        Schema::drop('carreras');
    }
}
