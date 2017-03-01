<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_contribuyente_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('rfc',14);
            $table->string('drs',254);
            $table->string('logo',50)->default('');
            $table->string('theme',60)->default('clasic');
            $table->string('color',20)->default('rgb(61,82,112)');
            $table->integer('precision')->default(2);
            $table->string('email',128)->nullable();
            $table->string('status',20)->default('activa');
            $table->float('procentaje_impuesto')->default(0);
            $table->text('regimen_fiscal')->nullable();
            $table->integer('remover_sellos')->default(0);
            $table->string('color_letra_e',20)->nullable();
            $table->text('leyenda')->nullable();
            $table->string('logotipo_srvpdf',200)->nullable();
            $table->integer('importar_xls')->default(0);
            $table->string('wst_url',100)->nullable();
            $table->string('wst_user',50)->nullable();
            $table->string('wst_pass',50)->nullable();
            $table->boolean('ret_iva')->default(false);
            $table->boolean('ret_isr')->default(false);
            $table->boolean('imp_local')->default(false);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');            
            $table->foreign('tipo_contribuyente_id')
                ->references('id')
                ->on('tipoContribuyentes');
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
        Schema::dropIfExists('empresas');
    }
}
