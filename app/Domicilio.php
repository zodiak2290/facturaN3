<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
	protected $table = 'domicilioSucursales';
	public $timestamps = false;
	
    protected $fillable = [
        'calle', 'nume', 'numi', 'colonia', 'localidad', 'delom', 'cp', 'sucursal_id'
    ];
}
