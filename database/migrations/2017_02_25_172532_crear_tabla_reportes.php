<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaReportes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rfc',15);
            $table->string('serie',45);
            $table->string('numaprob',45);
            $table->dateTime('fecha_expedicion');
            $table->double('monto_factura');
            $table->double('monto_importe');
            $table->string('efecto_comprobante');
            $table->text('pedimento');
            $table->dateTime('fecha_pedimento');
            $table->text('aduana');
            $table->integer('factura_id')->unsigned();
            $table->double('descuento');
            $table->double('subtotal');
            $table->double('tasa_iva');
            $table->string('moneda', 45);
            $table->double('importe');
            $table->foreign('factura_id')
                ->references('id')
                ->on('facturas')->onDelete('cascade');
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
        Schema::dropIfExists('reportes');
    }
}
