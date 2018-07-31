<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioaplicacionperfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioaplicacionperfil', function (Blueprint $table) {
            $table->increments('idUsuarioAplicacionPerfil')->unsigned();
            $table->integer('idUsuarioAplicacion')->unsigned();
            $table->integer('idPerfil')->unsigned();
            $table->boolean('estado');
            $table->datetime('fechaInicio')->nullable();
            $table->datetime('fechaFin')->nullable();
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
        Schema::dropIfExists('usuarioaplicacionperfil');
    }
}
