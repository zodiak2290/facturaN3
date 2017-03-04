<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    public static function getSellos($idSucursal)
    {
        return DB::table('sucursales')
                ->where('sucursales.id', $idSucursal)
                ->join('sellos','sucursales.id', '=', 'sellos.sucursal_id')
                ->get( [ 'sellos.id' ]);
    }
    /* 
select * 
from sucursales
join sellos on sellos.sucursal_id = sucursales.id
    */
}
