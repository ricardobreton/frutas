<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIdalcaldiaVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->unsignedBigInteger('alcaldia_id');
            $table->foreign('alcaldia_id')->references('id')->on('alcaldias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            Schema::table('videos', function (Blueprint $table) {
                $table->dropForeign(['alcaldia_id']);
                $table->dropColumn('alcaldia_id');
            });
        });
    }
}
