<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil', function (Blueprint $table) {
            $table->increments('idPerfil')->unsigned();
            $table->integer('idAplicacion')->unsigned();
            $table->string('nombrePerfil', 50);
            $table->string('descripcion', 150);
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
        Schema::dropIfExists('perfil');
    }
}
