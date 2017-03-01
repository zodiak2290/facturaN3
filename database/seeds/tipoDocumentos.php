<?php

use Illuminate\Database\Seeder;

class tipoDocumentos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$arrtiposDoc = array('FACTURA','NOTA DE CREDITO','NOTA DE CARGO','RECIBOS DE HONORARIOS','RECIBOS DE ARRENDAMIENTO','CARTA PORTE');

		foreach ($arrtiposDoc as $tipo) {
			\DB::table('tipoDocumentos')->insert(array(
        		'tipoDocumento' => $tipo
        	));
		}
    }
}
