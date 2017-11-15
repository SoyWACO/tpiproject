<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasantiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasantias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nombre');
            $table->text('descripcion');
            $table->enum('sexo', ['Masculino', 'Femenino', 'Indiferente']);
            $table->integer('duracion')->unsigned();
            $table->enum('unidad_duracion', ['Días', 'Semanas', 'Meses', 'Años']);
            $table->integer('edad_inicial')->unsigned();
            $table->integer('edad_final')->unsigned();
            $table->string('idioma')->nullable()->default('No se requiere idioma adicional');
            $table->string('pago')->nullable()->default('No remunerada');
            $table->enum('estado', ['Disponible', 'No disponible']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('pasantias');
    }
}
