<?php

use Illuminate\Database\Seeder;

class EstadosCFDISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$arrEstados = array('Activa','Cancelada','Libre','En proceso');

		foreach ($arrEstados as $estado) {
			\DB::table('estadosCFDI')->insert(array(
        		'estadoCFDI' => $estado
        	));
		}
    }
}