<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTatuadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tatuador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('descripcion');
            $table->string('red_social');
            $table->timestamps();

            
        });

        Schema::create('trabajo_tatuador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagen');
            $table->string('enlace');
            $table->string('descripcion');
            $table->integer('id_tatuador')->unsigned();
            $table->timestamps();

            $table->foreign('id_tatuador')->references('id')->on('tatuador')->onDelete('cascade');
        });

        
    }

    public function down()
    {
        
        Schema::drop('tatuador');
        Schema::drop('trabajo_tatuador');
    }
}
