<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadTuristicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunidad_turisticas', function (Blueprint $table) {
            $table->id();
            $table->string('ruta', 150);
            $table->time('tiempo')->nullable();
            $table->float('distancia', 6, 2)->nullable();
            $table->string('tipo_via', 50);
            $table->unsignedBigInteger('alcaldia_id');
            $table->timestamps();
            $table->foreign('alcaldia_id')->references('id')->on('alcaldias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comunidad_turisticas');
    }
}
