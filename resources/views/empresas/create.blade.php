@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
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
						<form class="form-horizontal" role="form" method="POST" action="{{ url('empresas') }}">
						{{ csrf_field() }}
						<section id="contribuyenteDatos">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group{{ $errors->has('rfc') ? ' has-error' : '' }}">
			                            <label for="rfc" class="col-md-3 control-label">* RFC</label>
			                            <div class="col-lg-9">
			                                <input id="rfc" type="text" class="form-control input-sm" name="rfc" value="{{ old('rfc') }}" required autofocus>
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
			                                <input id="regimen_fiscal" type="text" class="form-control input-sm" name="regimen_fiscal" value="{{ old('regimen_fiscal') }}" required>
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
			                                <select id="contribuyente" class="form-control input-sm" name="contribuyente" value="{{ old('contribuyente') }}" required >
													@foreach ( $contributentes as $tipo)
														<option value=" {{ $tipo->id }} ">
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
			                                <input id="drs" type="text" class="form-control input-sm" name="drs" value="{{ old('drs') }}" required >
			                                @if ($errors->has('drs'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('drs') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </section>
			            <section id="domFiscal">
							<div class="col-lg-12">
               				 	<legend ><H4>Domicilio Fiscal</H4></legend>
               				</div>
           				 	<div class="row">
               				 	<div class="col-lg-4 col-xs-12 paddingCero" >
									<div class="form-group{{ $errors->has('calle') ? ' has-error' : '' }}">
										<label for="calle" class="col-md-3 control-label">* Calle</label>
			                            <div class="col-lg-9">
			                                <input id="calle" type="text" class="form-control input-sm" name="calle" value="{{ old('calle') }}" required >
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
			                                <input id="nume" type="number" min="0" class="form-control input-sm" name="nume" value="{{ old('nume') }}" required placeholder="* Num. Ext">
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
			                                <input id="numi" type="number" min="0" class="form-control input-sm" name="numi" value="{{ old('numi') }}" required placeholder="* Num. Int">
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
			                                <input id="colonia" type="text" class="form-control input-sm" name="colonia" value="{{ old('colonia') }}" required >
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
			                                <input id="localidad" type="text" class="form-control input-sm" name="localidad" value="{{ old('localidad') }}" required >
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
			                                <input id="municipio" type="text" class="form-control input-sm" name="municipio" value="{{ old('municipio') }}" required >
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
			                                <input id="cp" type="number" min="0" class="form-control input-sm" name="cp" value="{{ old('cp') }}" required >
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
			                                <select id="estado" class="form-control input-sm" name="estado" value="{{ old('estado') }}" required >
													@foreach ( $estados as $estado)
														<option value=" {{ $estado->id }} ">
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
               				 	<legend ><H4>Información Adicional</H4></legend>
               				 	<div class="row">
               				 		<div class="col-lg-6">
               				 			<div class="col-lg-12 col-xs-12 paddingCero" >
											<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
												<label for="telefono" class="col-md-3 control-label"> Teléfono</label>
					                            <div class="col-lg-9">
					                                <input id="telefono" type="tel" class="form-control input-sm" name="telefono" value="{{ old('telefono') }}"  >
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
					                                <input id="email" type="email" class="form-control input-sm" name="email" value="{{ old('email') }}"  >
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
					                                <textarea id="leyenda"  class="form-control input-sm" name="leyenda" value="{{ old('leyenda') }}" rows="10" style="max-width: 100%" ></textarea>
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
                                Registrar
                            </button>
                        </div>
						</form>
					</div>
                </div>
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