<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioaplicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioaplicacion', function (Blueprint $table) {
            $table->increments('idUsuarioAplicacion')->unsigned();
            $table->integer('idAplicacion')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->boolean('estado');
            $table->string('usuarioCreacion', 20)->nullable();
            $table->string('usuarioModificacion', 20)->nullable();
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
        Schema::dropIfExists('usuarioaplicacion');
    }
}
