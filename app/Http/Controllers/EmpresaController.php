<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa as Empresa;
use App\Sucursal as Sucursal;
use App\Domicilio as Domicilio;

use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\EmpresaFormRequest;
use DB;

class EmpresaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \Auth::user()->id;
        $empresas = Empresa::where('user_id', $id)->get();
        //$empresas = (new Empresa())->getMatrices($id);
        //var_dump($empresas);
        return view('empresas/index', ['empresas' => $empresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoContribuyentes = (new Empresa())->getTipoContribuyentes();
        $estados = (new Empresa())->getEstados();

        $data = array(
            'contributentes' => $tipoContribuyentes,
            'estados' => $estados
        );
        return view('empresas/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaFormRequest $request)
    {

        $id = \Auth::user()->id;
    
        DB::beginTransaction();

           $empresa = Empresa::create([
                'rfc' => $request->get('rfc'),
                'user_id' => $id,
                'drs' => $request->get('drs'),
                'leyenda' => $request->get('leyenda'),
                'tipo_contribuyente_id' => $request->get('contribuyente'),
                'regimen_fiscal' =>  $request->get('regimen_fiscal')
            ]);

            $sucursal = Sucursal::create([
                'sucursal' => 'DOMICILIO FISCAL',
                'isMatriz' => true,
                'empresa_id' => $empresa->id
            ]);

            $domicilio = new Domicilio();
            $domicilio->sucursal_id = $sucursal->id;
            $domicilio->estado_id = $request->get('estado');
            $domicilio->calle = $request->get('calle');
            $domicilio->nume = $request->get('nume');
            $domicilio->numi = $request->get('numi');
            $domicilio->colonia = $request->get('colonia');
            $domicilio->localidad = $request->get('localidad');
            $domicilio->delom = $request->get('municipio');
            $domicilio->cp = $request->get('cp');
        
            DB::table('datosExtraSucursal')->insert([
                [
                    'sucursal_id' => $sucursal->id,
                    'email' => $request->get('email'),
                    'telefono1' => $request->get('telefono')
                ]
            ]);


        if($domicilio->save()){
            DB::commit();
        }else{
            DB::rollBack();
        }

        return Redirect::to('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$empresa = Empresa::find($id);
        $empresa = (new Empresa())->getMatriz($id);
        \Session::put('idempresa', $empresa->id);
        \Session::put('rfc' , $empresa->rfc);

        if ( $empresa) {
            $matrizConf = (new Empresa())->getConfig($id);
            $color = $matrizConf->color == 'rgb(61,82,112)';
            if( $matrizConf->cert && !$color){
            //preguntar si esta configurado    
            
                $mostrarSidebar = true;
                
                $data = array(
                    'empresas' => $empresa,
                    'mostrarSidebar' => $mostrarSidebar,
                );
                
                return view('empresas.show', $data);
            
            }else{
                $sucursal = (new Empresa())->getMatriz($id);
                $hasSello = count( Sucursal::getSellos($sucursal->id) ) > 0 ;
                $hasLogo = $matrizConf->logo || $matrizConf->logotipo_srvpdf;
                $data = array ( 
                    'sucursal' => $sucursal->sucursal, 
                    'hasSello' => $hasSello,
                    'hasLogo' => $hasLogo );
                
                return view('configuracion.edit', $data );
            }
        }else{
            return Redirect::to('/home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('empresas.edit', ['empresas' => Empresa::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaFormRequest $request, $id)
    {
        $empresa =  Empresa::findOrFail($id);
        $empresa->rfc = $request->get('rfc');
        $empresa->drs = $request->get('drs');
        $empresa->leyenda = $request->get('leyenda');
        $empresa->tipo_contribuyente_id = $request->get('contribuyente'); 
        $empresa->regimen_fiscal = $request->get('regimen_fiscal');
        $empresa->update();
        return Redirect::to('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //borrar empresa
        //$empresa  = Empresa::findOrFail()
    }
}
