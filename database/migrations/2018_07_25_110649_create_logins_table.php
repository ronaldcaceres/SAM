<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logins', function (Blueprint $table) {
            $table->increments('idLogin')->unsigned();
            $table->string('nombreDominio', 30)->unique();
            $table->string('password', 150);
            $table->string('api_token', 80)->unique()->nullable();
            $table->integer('numero_intentos');
            $table->boolean('estado');
            $table->string('usuarioCreacion', 20);
            $table->string('usuarioModificacion', 20);
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
        Schema::dropIfExists('logins');
    }
}
