<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('empresa');
            $table->string('ciudad');
            $table->string('direccion')->nullable();
            $table->enum('sector', ['Pública', 'Privada', 'ONG']);
            $table->string('telefono')->nullable();
            $table->string('web')->nullable();
            $table->enum('tipo', ['Administrador', 'Empresa'])->default('Empresa');
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
        Schema::drop('users');
    }
}
