<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToUsuarioaplicacionperfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarioaplicacionperfil', function (Blueprint $table) {
                $table->foreign('idUsuarioAplicacion')->references('idUsuarioAplicacion')->on('usuarioaplicacion');
                $table->foreign('idPerfil')->references('idPerfil')->on('perfil');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarioaplicacionperfil', function(Blueprint $table){
            $table->dropForeign(['idUsuarioAplicacion']);
            $table->dropForeign(['idPerfil']);
        });
    }
}
