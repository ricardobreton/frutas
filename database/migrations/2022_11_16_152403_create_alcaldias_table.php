<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlcaldiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alcaldias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150)->unique();
            $table->string('telefono', 50)->nullable();
            $table->string('correo', 250)->nullable();
            $table->string('direccion', 250)->nullable();
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
        Schema::dropIfExists('alcaldias');
    }
}
