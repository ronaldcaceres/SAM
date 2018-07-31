<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rol', function(Blueprint $table){
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
        Schema::table('rol', function(Blueprint $table){
            $table->dropForeign(['idAplicacion']);
        });
    }
}
