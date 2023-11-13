<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('categoria', 50);
            $table->string('nombre', 250)->nullable();
            $table->string('direccion', 250)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->unsignedBigInteger('alcaldia_id');
            $table->unsignedBigInteger('tipo_servicio_id');
            $table->timestamps();
            $table->foreign('alcaldia_id')->references('id')->on('alcaldias');
            $table->foreign('tipo_servicio_id')->references('id')->on('datos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
}
