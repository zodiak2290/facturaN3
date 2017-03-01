<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDatosExtraSucursal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datosExtraSucursal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sucursal_id')->unsigned();
            $table->string('entreca',250);
            $table->string('telefono1',45);
            $table->string('telefono2',45);
            $table->string('email',180);
            $table->foreign('sucursal_id')
                ->references('id')
                ->on('sucursales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datosExtraSucursal');
    }
}