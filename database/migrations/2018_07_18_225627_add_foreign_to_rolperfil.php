<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToRolperfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rolperfil', function(Blueprint $table){
            $table->foreign('idRol')->references('idRol')->on('rol');
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
        Schema::table('rolperfil', function(Blueprint $table){
            $table->dropForeign(['idRol']);
            $table->dropForeign(['idPerfil']);
        });
    }
}
