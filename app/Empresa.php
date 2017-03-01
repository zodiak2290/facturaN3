<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $hidden = [
        'wst_url', 'wst_pass','wst_user','remover_sellos','importar_xls','status','created_at','updated_at', 'user_id', 'tipo_contribuyente_id'
    ];

    public function usuario(){
    	return $this->belonsTo('App\User');
    }

    public static function getEmpresas($id)
    {
    	return DB::table('empresas')
    			->where('user_id', $id)
    			->join('tipoContribuyentes','empresas.tipo_contribuyente_id', '=', 'tipoContribuyentes.id')
    			->get([
    					'empresas.id', 'rfc', 'logo', 'theme', 'precision', 'email', 'regimen_fiscal', 'leyenda', 'logotipo_srvpdf', 'tipoContribuyente'
    				]);
    }
}
