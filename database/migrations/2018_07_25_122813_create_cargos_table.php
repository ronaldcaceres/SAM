<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->increments('idCargo')->unsigned();
            $table->integer('idArea')->unsigned();
            $table->string('nombreCargo', 50)->unique();
            $table->string('descripcion', 150);
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
        Schema::dropIfExists('cargos');
    }
}
