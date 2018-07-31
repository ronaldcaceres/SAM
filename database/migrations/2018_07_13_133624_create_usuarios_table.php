<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('idUsuario')->unsigned();
            $table->integer('idLogin')->unsigned()->unique();
            $table->integer('idCargo')->unsigned();
            $table->integer('idRegional')->unsigned();
            $table->string('nombreUsuario', 30);
            $table->string('apellidoPaterno', 30);
            $table->string('apellidoMaterno', 30);
            $table->unsignedInteger('documentoIdentidad');
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
        Schema::dropIfExists('usuarios');
        
    }
}
