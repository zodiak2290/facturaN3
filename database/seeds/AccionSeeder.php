<?php

use Illuminate\Database\Seeder;

class AccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$arrAcciones = array(
			array('factura', 'Crear Factura', true),
			array('clientes', 'Clientes', true),
			array('sucursales', 'Sucursales', false),
			array('productos', 'Productos', true),
			array('folios', 'Folios', false),
			array('layout', 'Layout', false),
			array('sat', 'Retporte SAT', false),
			array('reportes', 'Facturas Expedidas', false),
			array('tickets', 'Registrar Tickets', true),
		);
		foreach ($arrAcciones as $accion) {
			\DB::table('acciones')->insert(array(
	    		'nombre' => $accion[0],
	    		'descripcion' => $accion[1],
	    		'preactiva' => $accion[2]
	    	));
		}
    }
}
