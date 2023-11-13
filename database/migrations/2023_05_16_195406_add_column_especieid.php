<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnEspecieid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categoria_productos', function (Blueprint $table) {
            $table->unsignedBigInteger('especie_id')->nullable();
            $table->foreign('especie_id')->references('id')->on('especies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categoria_productos', function (Blueprint $table) {
            $table->dropForeign('categoria_productos_especie_id_foreign');
            $table->dropColumn('especie_id');
        });
    }
}
