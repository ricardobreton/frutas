<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunmRutaEspecies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('especies', function (Blueprint $table) {
            $table->string('name_ruta',250)->after('usar_icono')->default('generico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('especies', function (Blueprint $table) {
            $table->dropColumn('name_ruta');
        });
    }
}
