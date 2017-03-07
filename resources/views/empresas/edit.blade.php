@extends('layouts.app')

@section('content')

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
        	Datos del contribuyente 
        </div>
        <div class="panel-body">
			<div class="col-lg-12">
				<div class="col-lg-10 col-md-8 col-sm-6 col-xs-12">
					<em>
		            	Formulario de registro de empresa, los campos marcados con <strong>(*)</strong> son requeridos. 
		        	</em>
		        	
				</div>
				<div class="text-center">
					<a href="{{ url('/home') }}" class=" btn btn-danger"> Cancelar </a>	
				</div>
				
			</div>
			<div class="col-lg-12 container-fluid" style="margin-top: 2%;">
				<!--<form class="form-horizontal" role="form" method="PATCH" action="{{ url('empresas'). '/' . $empresa->id }}">-->
				{!!Form::model($empresa, ['method' => 'PATCH', 'route' => ['empresas.update', $empresa->id] ] ) !!}
				{{ Form::token() }} 
				<section id="contribuyenteDatos">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group{{ $errors->has('rfc') ? ' has-error' : '' }}">
	                            <label for="rfc" class="col-md-3 control-label">* RFC</label>
	                            <div class="col-lg-9">
	                                <input id="rfc" type="text" class="form-control input-sm" name="rfc" value="{{ $empresa->rfc }}" required autofocus>
	                                @if ($errors->has('rfc'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('rfc') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>
						<div class="col-lg-6">
							<div class="form-group{{ $errors->has('regimen_fiscal') ? ' has-error' : '' }}">
	                            <label for="regimen_fiscal" class="col-md-3 control-label">* Régimen Fiscal</label>
	                            <div class="col-lg-9">
	                                <input id="regimen_fiscal" type="text" class="form-control input-sm" name="regimen_fiscal" value="{{  $empresa->regimen_fiscal }}" required>
	                                @if ($errors->has('regimen_fiscal'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('regimen_fiscal') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>
	                </div>
	      			<div class="row">
						<div class="col-lg-6">
							<div class="form-group{{ $errors->has('contribuyente') ? ' has-error' : '' }}">
	                            <label for="rfc" class="col-md-3 control-label">* Tipo Contribuyente</label>
	                            <div class="col-lg-9">
	                                <select id="contribuyente" class="form-control input-sm" name="contribuyente"  required >
											@foreach ( $contributentes as $tipo)
												<option value=" {{ $tipo->id }} " @if($empresa->tipo_contribuyente_id == $tipo->id )  selected @endif >
													{{ $tipo->tipoContribuyente }}
												</option>
											@endforeach
	                                </select>
	                                @if ($errors->has('contribuyente'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('contribuyente') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>
						<div class="col-lg-6">
							<div class="form-group{{ $errors->has('drs') ? ' has-error' : '' }}">
	                            <label for="drs" class="col-md-3 control-label">* Razón Social</label>
	                            <div class="col-lg-9">
	                                <input id="drs" type="text" class="form-control input-sm" name="drs" value="{{ $empresa->drs }}" required >
	                                @if ($errors->has('drs'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('drs') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>
	            </section>
	            <section id="domFiscal">
					<div class="col-lg-12">
       				 	<legend ><h5>Domicilio Fiscal</h5></legend>
       				</div>
   				 	<div class="row">
       				 	<div class="col-lg-4 col-xs-12 paddingCero" >
							<div class="form-group{{ $errors->has('calle') ? ' has-error' : '' }}">
								<label for="calle" class="col-md-3 control-label">* Calle</label>
	                            <div class="col-lg-9">
	                                <input id="calle" type="text" class="form-control input-sm" name="calle" value="{{ $empresa->calle }}" required >
	                                @if ($errors->has('calle'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('calle') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>
       				 	<div class="col-lg-2 col-sm-4 col-xs-6 paddingCero">
							<div class="form-group{{ $errors->has('nume') ? ' has-error' : '' }}">
	                            <div class="col-lg-9">
	                                <input id="nume" type="number" min="0" class="form-control input-sm" name="nume" value="{{ $empresa->nume }}" required placeholder="* Num. Ext">
	                                @if ($errors->has('nume'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('nume') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>
       				 	<div class="col-lg-2 col-sm-4 col-xs-6 paddingCero">
							<div class="form-group{{ $errors->has('numi') ? ' has-error' : '' }}">
	                            <div class="col-lg-9">
	                                <input id="numi" type="number" min="0" class="form-control input-sm" name="numi" value="{{ $empresa->numi }}" required placeholder="* Num. Int">
	                                @if ($errors->has('numi'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('numi') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-4 col-xs-12 paddingCero" >
							<div class="form-group{{ $errors->has('colonia') ? ' has-error' : '' }}">
								<label for="colonia" class="col-md-4 control-label">* Colonia</label>
	                            <div class="col-lg-8">
	                                <input id="colonia" type="text" class="form-control input-sm" name="colonia" value="{{ $empresa->colonia }}" required >
	                                @if ($errors->has('colonia'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('colonia') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>			         
   				 	</div>
   				 	<div class="row">
   				 		<div class="col-lg-6 col-xs-12 paddingCero" >
							<div class="form-group{{ $errors->has('localidad') ? ' has-error' : '' }}">
								<label for="localidad" class="col-md-3 control-label">* Localidad</label>
	                            <div class="col-lg-9">
	                                <input id="localidad" type="text" class="form-control input-sm" name="localidad" value="{{ $empresa->localidad }}" required >
	                                @if ($errors->has('localidad'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('localidad') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-lg-6 col-xs-12 paddingCero" >
							<div class="form-group{{ $errors->has('municipio') ? ' has-error' : '' }}">
								<label for="municipio" class="col-md-3 control-label">* Municipio</label>
	                            <div class="col-lg-9">
	                                <input id="municipio" type="text" class="form-control input-sm" name="municipio" value="{{ $empresa->delom }}" required >
	                                @if ($errors->has('municipio'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('municipio') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>
   				 	</div>
   				 	<div class="row">
   				 		<div class="col-lg-4 col-xs-12 paddingCero" >
							<div class="form-group{{ $errors->has('cp') ? ' has-error' : '' }}">
								<label for="cp" class="col-md-3 control-label">* CP</label>
	                            <div class="col-lg-9">
	                                <input id="cp" type="number" min="0" class="form-control input-sm" name="cp" value="{{ $empresa->cp }}" required >
	                                @if ($errors->has('cp'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('cp') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>
	                   	<div class="col-lg-6">
							<div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
	                            <label for="estado" class="col-md-3 control-label">* Estado</label>
	                            <div class="col-lg-9">
	                                <select id="estado" class="form-control input-sm" name="estado"  required >
											@foreach ( $estados as $estado)
												<option value=" {{ $estado->id }}" @if($empresa->estado_id == $estado->id )  selected @endif>
													{{ $estado->estado }}
												</option>
											@endforeach
	                                </select>
	                                @if ($errors->has('estado'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('estado') }}</strong>
	                                    </span>
	                                @endif
	                            </div>
	                        </div>
	                    </div>	
   				 	</div>
	            </section>
	            <section id="adicioanl">
					<div class="col-lg-12">
       				 	<legend ><h5>Información Adicional</h5></legend>
       				</div>
   				 	<div class="row">
   				 		<div class="col-lg-6">
   				 			<div class="col-lg-12 col-xs-12 paddingCero" >
								<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
									<label for="telefono" class="col-md-3 control-label"> Teléfono</label>
		                            <div class="col-lg-9">
		                                <input id="telefono" type="tel" class="form-control input-sm" name="telefono" value="{{ $empresa->telefono1 }}"  >
		                                @if ($errors->has('telefono'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('telefono') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>
		                    </div>
		                    <div class="col-lg-12 col-xs-12 paddingCero" >
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="email" class="col-md-3 control-label"> Email</label>
		                            <div class="col-lg-9">
		                                <input id="email" type="email" class="form-control input-sm" name="email" value="{{ $empresa->email }}"  >
		                                @if ($errors->has('email'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>
		                    </div>
   				 		</div>
   				 		<div class="col-lg-6">
   				 			<div class="col-lg-12 col-xs-12 paddingCero" >
								<div class="form-group{{ $errors->has('leyenda') ? ' has-error' : '' }}">
									<label for="leyenda" class="col-md-3 control-label"> Leyenda PDF</label>
		                            <div class="col-lg-9">
		                                <textarea id="leyenda"  class="form-control input-sm" name="leyenda" rows="5" style="max-width: 100%" >{{ $empresa->leyenda }}
		                                </textarea>
		                                @if ($errors->has('email'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>
		                    </div>
   				 		</div>
   				 	</div>
       			</section>
                @if (count($errors) > 0)
                	<div class="alert alert-danger">
                		<ul>
                			@foreach ($errors->all() as $error)
                				<li> {{ $error }}</li>
                			@endforeach
                		</ul>
                	</div>
                @endif
                <div class="form-group text-center">                            
                    <button type="submit" class="btn btn-primary" id="registrar">
                        Editar
                    </button>
                </div>
				</form>
			</div>
        </div>
    </div>
</div>
<style>
	.paddingCerol{
		padding-left: 10px;
		padding-right: 10px;
	}
</style>
@endsection