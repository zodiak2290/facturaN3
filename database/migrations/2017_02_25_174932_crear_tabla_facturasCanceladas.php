<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFacturasCanceladas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturasCanceladas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('motivo');
            $table->integer('factura_id')->unsigned();
            $table->dateTime('fecha_hora_cancelacion');
            $table->foreign('factura_id')
                ->references('id')
                ->on('facturas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturasCanceladas');
    }
}
