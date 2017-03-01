<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSucursalesCompartidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursalesCompartidas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sucursal_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->dateTime('fecha_inicio')->useCurrent();
            $table->dateTime('fecha_final')->nullable();
            $table->integer('folio')->default(1);
            $table->integer('certi')->default(1);
            $table->foreign('sucursal_id')
                ->references('id')
                ->on('sucursales')->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursalesCompartidas');
    }
}
