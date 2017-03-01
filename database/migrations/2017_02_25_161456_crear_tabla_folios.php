<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFolios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folios', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serie',45);
            $table->string('folioi',45);
            $table->string('foliof',45);
            $table->string('anioaprobacio',45);
            $table->integer('tipo_documento_id')->unsigned();
            $table->integer('num_folios')->unsigned();
            $table->integer('sucursal_id')->unsigned(); 
            $table->timestamp('fecha_inicial')->useCurrent();
            $table->timestamp('fecha_final')->nullable();
            $table->integer('folio_actual')->unsigned()->defaul(0);
            $table->text('archivo_cbb')->nullable();
            $table->foreign('tipo_documento_id')
                ->references('id')
                ->on('tipoDocumentos')->onDelete('cascade');
            $table->foreign('sucursal_id')
                ->references('id')
                ->on('sucursales')->onDelete('cascade');
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
        Schema::dropIfExists('folios');
    }
}
