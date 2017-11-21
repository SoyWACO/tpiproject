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
        Schema::create('carrera_proyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proyecto_id')->unsigned();
            $table->integer('carrera_id')->unsigned();

            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');

            $table->timestamps();
        });

        // Relación muchos a muchos: pasantia_carrera
        Schema::create('carrera_pasantia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pasantia_id')->unsigned();
            $table->integer('carrera_id')->unsigned();

            $table->foreign('pasantia_id')->references('id')->on('pasantias')->onDelete('cascade');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');

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
