<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultimediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimedia', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_media', 50);
            $table->string('ruta',250);
            $table->string('seccion',150);
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
        Schema::dropIfExists('multimedia');
    }
}
