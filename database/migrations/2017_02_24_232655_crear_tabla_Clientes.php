<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empresa_id')->unsigned();
            $table->integer('estado_id')->unsigned()->nullable();
            $table->string('rfc',15);
            $table->string('razonsocial',200);
            $table->string('calle',150)->nullable();
            $table->string('nume',100)->nullable();
            $table->string('numi',100)->nullable();
            $table->string('colonia',150)->nullable();
            $table->string('municipio',150)->nullable();
            $table->string('localidad',150)->nullable();
            $table->string('cp',10)->nullable();
            $table->string('referencia',100)->nullable();
            $table->string('email',128)->nullable();
            $table->string('telefono',60)->nullable();
            $table->string('codigo_cliente',64)->nullable();
            $table->boolean('isActivo')->default(true);
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')->onDelete('cascade');
            $table->foreign('estado_id')
                ->references('id')
                ->on('estados');

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
        Schema::dropIfExists('clientes');
    }
}
