<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('correo');
            $table->string('password');
            $table->enum('tipo', ['user', 'admin']);
            $table->rememberToken();
            $table->timestamps();

            $table->unique('correo');
        });

        Schema::create('usuario_perfil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->enum('genero', ['m', 'f']);
            $table->date('fecha_nacimiento');
            $table->integer('id_usuario')->unsigned();
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
        });

        
    }

    public function down()
    {
        
        Schema::drop('usuario_perfil');
        Schema::drop('usuario');
    }
}
