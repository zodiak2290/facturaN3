<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{

	protected $table = 'sucursales';

    protected $fillable = [
        'sucursal', 'isMatriz', 'empresa_id',
    ];

    public function empresa()
    {
    	return $this->belongsTo('App\Empresa');
    }

    public function domicilio(){
    	return $this->hasOne('App\Domicilio');
    }
}
