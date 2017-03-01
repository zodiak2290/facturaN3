<?php

use Illuminate\Database\Seeder;

class tipoContribuyentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'PERSONA FISICA'
		//'PERSONA MORAL'
    	$tiposC = array('PERSONA FISICA','PERSONA MORAL');

		foreach ($tiposC as $tipo) {
			\DB::table('tipoContribuyentes')->insert(array(
        		'tipoContribuyente' => $tipo
        	));
		}
    }
}
