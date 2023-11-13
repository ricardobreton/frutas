<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSucursales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->string('departamento',50);
            $table->string('nombre_sucursal',250);
            $table->string('direccion',250);
            $table->string('coordenadas',50);
            $table->unsignedBigInteger('responsable_id');
            $table->timestamps();
            $table->foreign('responsable_id')
                ->references('id')
                ->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursales');
    }
}
