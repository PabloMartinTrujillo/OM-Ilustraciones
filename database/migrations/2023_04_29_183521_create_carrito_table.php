<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito', function (Blueprint $table) {
            $table->id("idCar");
            $table->unsignedBigInteger("idUsu");
            $table->unsignedBigInteger("idEnc");
            $table->string("fechaCar")->default(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Carbon\Carbon::now()->toDateTimeString())->format('d/m/Y H:i:s'));;
            
            $table->foreign("idUsu")->references("idUsu")->on("users")->onDelete("cascade");
            $table->foreign("idEnc")->references("idEnc")->on("encargo")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrito');
    }
}
