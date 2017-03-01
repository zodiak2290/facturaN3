<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empresa_id')->unsigned();
            $table->string('numiden',45);
            $table->text('descripcion');
            $table->float('precio');
            $table->string('unidad',10);
            $table->string('pedimentos',45)->nullable();
            $table->string('aduana',70)->nullable();
            $table->date('fecha_pedimento')->nullable();
            $table->boolean('predefinido')->default(false);
            $table->float('tax')->nullable();
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
