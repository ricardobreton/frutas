<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImgTheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_imgs', function (Blueprint $table) {
            $table->id();
            $table->string('seccion',100);
            $table->string('ruta_img', 250);
            $table->unsignedBigInteger('especie_id');
            $table->timestamps();
            $table->foreign('especie_id')
                ->references('id')
                ->on('especies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theme_imgs');
    }
}
