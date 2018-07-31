<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regionales', function (Blueprint $table) {
            $table->increments('idRegional');
            $table->string('nombreRegional', 30)->unique();
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
        Schema::dropIfExists('regionales');
    }
}
