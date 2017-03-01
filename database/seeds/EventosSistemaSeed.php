<?php

use Illuminate\Database\Seeder;

class EventosSistemaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$eventos = array('Cambio de contraseña','Acceso','Apertura de cuenta','Validación de correo','Envío de liga de validación');

		foreach ($eventos as $evento) {
			\DB::table('eventosSistema')->insert(array(
        		'eventoSistema' => $evento
        	));
		} 
    }
}
