<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolperfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolperfil', function (Blueprint $table) {
            $table->increments('idRolPerfil')->unsigned();
            $table->integer('idRol')->unsigned();
            $table->integer('idPerfil')->unsigned();
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
        Schema::dropIfExists('rolperfil');
    }
}
