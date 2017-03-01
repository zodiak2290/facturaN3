<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPermisosSucursalCompartida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisosSucursalCompartida', function (Blueprint $table) {
            $table->string('id',10);
            $table->integer('sucursal_compartida_id')->unsigned();
            $table->integer('accion_id')->unsigned();
            $table->foreign('sucursal_compartida_id')
                ->references('id')
                ->on('sucursalesCompartidas')->onDelete('cascade');
            $table->foreign('accion_id')
                ->references('id')
                ->on('acciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisosSucursalCompartida');
    }
}
