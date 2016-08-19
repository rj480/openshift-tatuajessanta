<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaTrabajoField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trabajo_tatuador', function ($table) {
            $table->enum('categoria', ['trabajo', 'dibujo'])->after('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trabajo_tatuador', function ($table) {
            $table->dropColumn('categoria');
        });
    }
}
