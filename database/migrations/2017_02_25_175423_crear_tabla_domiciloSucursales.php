<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDomiciloSucursales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilioSucursales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sucursal_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->string('calle',150)->nullable();
            $table->string('nume',100)->nullable();
            $table->string('numi',100)->nullable();
            $table->string('colonia',150)->nullable();
            $table->string('localidad',150)->nullable();
            $table->string('delom',150);
            $table->string('cp',10);
            $table->foreign('sucursal_id')
                ->references('id')
                ->on('sucursales')->onDelete('cascade');
            $table->foreign('estado_id')
                ->references('id')
                ->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domicilioSucursales');
    }
}
