<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSellos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cert',100);
            $table->string('keyo',100);
            $table->string('pass',100);
            $table->string('certpem',100)->nullable();
            $table->string('keypem',100)->nullable();
            $table->string('serie', 30)->nullable();
            $table->integer('sucursal_id')->unsigned();
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
        Schema::dropIfExists('sellos');
    }
}
