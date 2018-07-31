<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToUsuarioAplicacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarioaplicacion', function(Blueprint $table){
            $table->foreign('idUsuario')->references('idUsuario')->on('usuarios');
            $table->foreign('idAplicacion')->references('idAplicacion')->on('aplicacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarioaplicacion', function(Blueprint $table){
            $table->dropForeign(['idUsuario']);
            $table->dropForeign(['idAplicacion']);
        });
    }
}
