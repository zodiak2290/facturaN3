<?php

namespace App\Http\Controllers;

use SoapClient;
use App\Sello;
use App\Empresa;
use App\Sucursal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class CertificadoController extends Controller
{

	private $tipoPerCer = array('application/x-x509-ca-cert','application/octet-stream', 'application/pkix-cert');
    private $tipoPerKey = array('application/x-iwork-keynote-sffkey','','application/octet-stream', 'application/pkix-cert');

    private $fileCert, $fileKey;
    private $mensaje = '';

    public function index(Request $request)
    {
        $this->rfc = \Session::get('rfc');
        $this->idempresa = \Session::get('idempresa');
        $this->idsucursal = (new Empresa())->getIdSucursal($this->idempresa)->id;
    
    	if ( Input::hasFile('certificado') && Input::hasFile('certificado') && $request->get('pass') ) {
    		$this->fileCert = Input::file('certificado');
    		$this->fileKey  =  Input::file('key');
            $this->pass = $request->get('pass');

    		if($this->filesValid() ){
    			$this->saveCert();
    		}
    	}else{
    		$this->mensaje = 'No se encontraron los archivos';
    	}

        return $this->volverA();
    }

    private function saveCert()
    {
    	if( !$this->hasPuntos() ){
			$isUpload = $this->uploadFiles(); 
			$isSaved = $this->guardarSelloDB();
			if( $isUpload && $isSaved ){
                $this->mensaje = 'Todo va de maravilla.';
                //necesitaremos en algun momento el idsello guardado previamente 
                $contenidoCert = $this->getContentCert(); 
                $contenidoKey = $this->getContentKey();
                
                if($contenidoKey != '' ){ // Si contenidoKey es diferente de nada entonces la contraseña es correcta
                    $nSerie = $this->getNSerie();
                    if($nSerie){ 
                        if( $this->soapCall() ){
                            
                            $sello =  Sello::findOrFail($this->getIdSello() );
                            $sello->certpem = $this->nombreFileCert . ".pem";
                            $sello->keypem = $this->nombreFileKey . ".pem";
                            $sello->serie = $nSerie;

                            if( $sello->update() ){
                                $this->mensaje = "Certificado cargado de manera exitosa";
                            }else{
                                $this->mensaje = "El certificado no pudo ser cargado.";
                            }
                        }             
                    }else{
                        $this->mensaje = "No fue posible obtener el N° de Serie, verifique sus datos.";
                    }
                }else{
                    
                    $this->mensaje = "La contraseña es incorrecta";
                    $this->deleteFilesAndSello();
                }

            }else{
                $this->mensaje = 'Lo sentimos no pudimos guardar los archivos.';
                //return $this->volverA();                
            }
		}else{
			$this->mensaje = 'Uno de los archivos tiene (.) en su nombre';
			//return $this->volverA();
		}
	}

    private function getIdSello(){
        $selloSucursal = Sucursal::getSellos($this->idsucursal);
        $idsello = $selloSucursal ? $selloSucursal->first()->id : 0;
        return $idsello;
    }

    private function getParams(){
        $path = $this->getPath();
    
        $params = array(
                'emisorRFC' => $this->rfc,
                'UserID' => getenv('USERID'),
                'UserPass' => getenv('USERPASS')
        );

        $params['archivoKey'] = base64_encode(file_get_contents($path.$this->nombreFileKey));
        $params['archivoCer'] = base64_encode(file_get_contents($path.$this->nombreFileCert));
        $params['clave'] = utf8_encode($this->pass);
        return $params;
    }

    private function  deleteFilesAndSello()
    {                   
        $idsello = $this->getIdSello();

        Sello::find( $idsello)->delete(); 
        $this->deleteFiles();  //Verificar si es necesario eliminar los archivos
    }

    private function soapCall(){
        try{
            $cliente = new SoapClient(getenv('URL_TIMBRADO') ,array('trace' => 1));
            $respuesta = $cliente->activarCancelacion( (object) $this->getParams() );
            return true;
        }catch (SoapFault $e){
            $this->mensaje = $e->faultstring;
            $this->deleteFilesAndSello();
            return false;
        } 
    }

    private function deleteFiles()
    {
        $nameFiles = array($this->nombreFileKey, $this->nombreFileKey. '.pem', $this->nombreFileCert, $this->nombreFileCert. '.pem' );

        foreach ($nameFiles as $nameFile) {
             File::delete($this->getPath().$nameFile );
        }
    }

    private function getNSerie()
    {
        $path = $this->getPath();
        $serie = shell_exec('openssl x509 -inform DER -in '.$path.$this->nombreFileCert.' -noout -serial');
        $nSerie = $this->limpiaSerie($serie);
        return $nSerie;
    }

    private function getPath()
    {
        $id = \Auth::user()->id;
        $path = storage_path().'/users/'.$id."/certificados/";
        return $path;
    }

    private function getContentKey()
    {
        $nameKeyPem = $this->nombreFileKey.'.pem';

        $path = $this->getPath();
        $llave = shell_exec('openssl pkcs8 -inform DER -in '.$path.$this->nombreFileKey.' -passin pass:\''.$this->pass.'\' -out '.$path.$nameKeyPem); 
        $privkey = file_get_contents($path.$nameKeyPem);
        return $privkey;
    }

    private function getContentCert()
    {
        $nameCertPem = $this->nombreFileCert.'.pem';
        $path = $this->getPath();
        $pubkey = shell_exec('openssl x509 -inform DER -outform PEM -in '. $path.$this->nombreFileCert .' -pubkey -out '.$path.'/'.$nameCertPem); 
        $cert = file_get_contents($path.'/'.$nameCertPem);
        return $cert;      
    }

    private function guardarSelloDB(){
        $selloSucursal = Sucursal::getSellos($this->idsucursal);
        $data = array (
                'nombreFileCert' => $this->nombreFileCert,
                'nombreFileKey' => $this->nombreFileKey,
                'pass' => $this->pass,
                'idsucursal' => $this->idsucursal
                );
        $sello = new Sello();
        
        if( count($selloSucursal) > 0){
            $id = $selloSucursal->first()->id;
            return $sello->actualizar( $id, $data);
        }else{
            return $sello->add($data);
        }
    }

    private function volverA(){
    	$id = \Auth::user()->id;
    	return redirect('empresas/'.$id)->with('message', $this->mensaje);
    }

    private function uploadFiles()
    {
    	$path = $this->getPath();
    	return $this->fileCert->move($path, $this->nombreFileCert) && $this->fileKey->move($path, $this->nombreFileKey);
    }

    private function filesValid()
    {
		$mimeCert = $this->fileCert->getMimeType();
		$mimeKey =  $this->fileKey->getMimeType();


		$fileCertValido = in_array($mimeCert, $this->tipoPerCer);
		$fileKeyValido = in_array($mimeKey, $this->tipoPerKey); 

		if( !($fileCertValido && $fileKeyValido) ){
    		$this->mensaje .= $fileKeyValido ? '' : 'Error en el archivo .key';
    		$this->mensaje .= $fileCertValido ? '' : ' Error en el tipo de certificado';
    		return false;
		}

		return true;
    }

    private function hasPuntos(){
        $datacert = $this->fileCert->getClientOriginalName();
        $datakey = $this->fileKey->getClientOriginalName(); 
        $pedazocert = explode(".", $datacert);
        $pedazokey= explode(".", $datakey);
        $puedocert = count($pedazocert);
        $puedokey = count($pedazokey); 
        
        $this->setNameFiles($pedazokey, $pedazocert);
        return ($puedocert != 2 || $puedokey != 2);   
    }

    private function setNameFiles($pedazokey, $pedazocert){

      	$mixrfid=$this->rfc.$this->idsucursal.$pedazocert[0];
      	$this->nombreFileCert = $this->remplazar($mixrfid.'.'.$pedazocert[1]);
      	$this->nombreFileKey  = $this->remplazar($mixrfid.'.'.$pedazokey[1]);
    }

    private function remplazar($nameFile){
      	$name = str_replace('&','amp',$nameFile);
      	return $name; 
    }


    private function limpiaSerie($serie){
        $serie=explode('=',$serie);
        if(count($serie)>1){          
            $serie=$serie[1];
            $x=1;
            $serielimpia='';
        do{
            $serielimpia=$serielimpia.$serie[$x];
            $x=$x+2;
        }while($x<strlen($serie));
            return $serielimpia;
        }else{
            return false;
        }
    }
}
