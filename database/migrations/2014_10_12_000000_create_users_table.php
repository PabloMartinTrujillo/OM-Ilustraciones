<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id("idUsu");
            $table->string('tipoUsu');
            $table->string('nomUsu');
            $table->string('email')->unique();
            $table->string('password')->default("1234");
            $table->string('fechaCreacionUsu')/* ->default(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Carbon\Carbon::now()->toDateTimeString())->format('d/m/Y H:i:s')) */;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
