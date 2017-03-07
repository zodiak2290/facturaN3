<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Empresa extends Model
{
    protected $hidden = [
        'wst_url', 'wst_pass','wst_user','remover_sellos','importar_xls','status','created_at','updated_at', 'user_id'
    ];

    protected $fillable = [
        'rfc', 'drs', 'regimen_fiscal', 'tipo_contribuyente_id', 'leyenda', 'user_id'
    ];
    
    public function usuario(){
    	return $this->belonsTo('App\User');
    }

    public function sucursal(){
        return $this->hasMany('App\Sucursal');
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


    public function getTipoContribuyentes()
    {
        return DB::table('tipoContribuyentes')
                     ->get();
    }

    public function getEstados()
    {
        return DB::table('estados')
                     ->get();
    }

    public function getConfig($id){
        $sucursalMatriz = DB::table('empresas')
                ->join('sucursales', 'empresas.id','=', 'sucursales.empresa_id')
                ->leftJoin('sellos', 'sucursal_id','sellos.id')
                ->where('empresas.id', '=', $id)
                ->where('isMatriz','=', true)
                ->select('*')
                ->get()->first();
        return $sucursalMatriz;
    }

    public function getMatriz($id, $getDom = false){
        $sucursalMatriz = DB::table('empresas')
                ->join('sucursales', 'empresas.id','=', 'sucursales.empresa_id');
        if( $getDom ){
            $sucursalMatriz->join('domicilioSucursales', 'domicilioSucursales.sucursal_id', '=', 'sucursales.id');
            $sucursalMatriz->join('datosExtraSucursal', 'datosExtraSucursal.sucursal_id', '=', 'sucursales.id');
        }
        $sucursal =    $sucursalMatriz->where('empresas.id', '=', $id)
                ->where('isMatriz','=', true)
                ->select('*')
                ->get()->first();
        return $sucursal;   
    }

    public function getMatrices($userId)
    {
        $sucursalesMatriz = DB::table('empresas')
                ->join('sucursales', 'empresas.id','=', 'sucursales.empresa_id')
                ->where('empresas.user_id', '=', $userId)
                ->where('isMatriz','=', true)
                ->select('*')
                ->get();
        return $sucursalesMatriz;  
    }


    public function getIdSucursal($idempresa)
    {
        $idsucursal = DB::table('empresas')
        ->join('sucursales', 'empresas.id','=', 'sucursales.empresa_id')
        ->where('empresas.id', '=', $idempresa)
        ->where('isMatriz','=', true)
        ->select('sucursales.id')
        ->get()->first();
        return $idsucursal; 
    }
}




