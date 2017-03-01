<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaBitacora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evento_sistema_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->dateTime('fecha_hora_evento');
            $table->string('ip',15);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('evento_sistema_id')
                ->references('id')
                ->on('eventosSistema')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora');
    }
}
