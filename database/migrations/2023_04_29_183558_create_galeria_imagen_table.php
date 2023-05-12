<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriaImagenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_imagen', function (Blueprint $table) {
            $table->unsignedBigInteger("idGal");
            $table->unsignedBigInteger("idImg");
            
            $table->primary(["idGal","idImg"]);

            $table->foreign("idGal")->references("idGal")->on("galeria")->onDelete("cascade");
            $table->foreign("idImg")->references("idImg")->on("imagen")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeria_imagen');
    }
}
