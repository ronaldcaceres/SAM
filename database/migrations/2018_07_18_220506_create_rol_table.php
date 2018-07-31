<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol', function (Blueprint $table) {
            $table->increments('idRol')->unsigned();
            $table->integer('idAplicacion')->unsigned();
            $table->string('nombreRol', 30);
            $table->string('descripcion', 150);
            $table->string('nombreFormulario', 60);
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
        Schema::dropIfExists('rol');
    }
}
