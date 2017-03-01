<?php

use Illuminate\Database\Seeder;

class EstadosFactura extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$arrEstados = array('pagada','financiada','credito');

		foreach ($arrEstados as $estado) {
			\DB::table('estadosFactura')->insert(array(
        		'estadoFac' => $estado
        	));
		}
    }
}
