<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sello extends Model
{

	public function add( $data ){
                extract( $data );
                $sello = new Sello();
                $sello->cert = $nombreFileCert;
                $sello->keyo = $nombreFileKey;
                $sello->pass = $pass;
                $sello->sucursal_id = $idsucursal;

                return $sello->save();
	}

	public function actualizar( $id , $data){
        	extract($data);
                $sello =  Sello::findOrFail($id);
         	$sello->cert = $nombreFileCert;
                $sello->keyo = $nombreFileKey;
                $sello->pass = $pass;
                $sello->updated_at = Carbon::now();

                return $sello->update();
	}
}	
