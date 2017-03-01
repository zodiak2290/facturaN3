<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaImpuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impuestos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',45)->unique();
            $table->string('clave',64)->unique();
            $table->double('tasa')->nullable();
            $table->enum('tipo',['R','T']);
            $table->enum('ambito',['L','F']);
            $table->string('grupo',45)->nullable();
            $table->boolean('estado')->default(true)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impuestos');
    }
}
