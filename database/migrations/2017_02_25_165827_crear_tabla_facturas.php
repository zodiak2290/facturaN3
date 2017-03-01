<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFacturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('folio_id')->unsigned();
            $table->string('folio_facturado',100);
            $table->string('archivo_xml',100);
            $table->text('texto_xml');
            $table->text('cadena_original')->nullable();
            $table->text('sello')->nullable();
            $table->integer('estado_cfdi_id')->unsigned();
            $table->string('archivo_html',100);
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->string('uuid', 36)->nullable();
            $table->integer('estado_factura_id')->unsigned()->nullable();

            $table->foreign('folio_id')
                ->references('id')
                ->on('folios')->onDelete('cascade');

            $table->foreign('estado_factura_id')
                ->references('id')
                ->on('estadosFactura');

            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes');

            $table->foreign('estado_cfdi_id')
                ->references('id')
                ->on('estadosCFDI');

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
        Schema::dropIfExists('facturas');
    }
}
