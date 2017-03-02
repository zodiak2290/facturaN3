@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
		
		@if (!Auth::user()->correoValidado)
        	<div class="alert alert-warning" role="alert">
        		Tu correo {{Auth::user()->email}} no ha sido validado, para hacerlo <a href="" class="alert-link"> Envia liga de validación. </a>
        	</div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
				@if ( !count($empresas) )
					<div class="alert alert-info" role="alert">
						Registra tu empresa   <a href="{{ url('empresas/create') }}" class="alert-link">Aquí. </a>
					</div>
                @else
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="tile">
                                <h3 class="tile-title">
                                    Sucursales
                                </h3>
                                <a href="{{ url('empresas') }}" class="btn btn-primary btn-large btn-block" >
                                    Ver
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="tile">
                                <h3 class="tile-title">
                                    Sucursales Compartidas
                                </h3>
                                <a href="" class="btn btn-primary btn-large btn-block" >
                                    Ver
                                </a>
                            </div>
                        </div>
                    </div>
            	@endif
            </div>
        </div>
    </div>
@endsection
