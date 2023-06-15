<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncargoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encargo', function (Blueprint $table) {
            $table->id("idEnc");
            $table->unsignedBigInteger("idCar");

            $table->string("imagenEnc");
            $table->string("estiloEnc",100);
            $table->integer("numPerEnc");
            $table->string("tamEnc",50);
            $table->integer("cantEnc");
            $table->string("comEnc")->nullable();
            $table->string("fecha_encargo");
            $table->string("fecha_entrega")->nullable();
            $table->integer("precio");

            $table->foreign("idCar")->references("idCar")->on("carrito")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encargo');
    }
}
