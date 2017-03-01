@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			
			@if (!Auth::user()->correoValidado)
	        	<div class="alert alert-warning" role="alert">
	        		Tu correo {{Auth::user()->email}} no ha sido validado, para hacerlo <a href="" class="alert-link"> Envia liga de validación. </a>
	        	</div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Listado de empresas registradas</div>

                <div class="panel-body">

                		{{Auth::user()}}

					@if ( !count($empresas) )
						<div class="alert alert-info" role="alert">
							Registra tu empresa   <a href="{{ url('empresas/create') }}" class="alert-link">Aquí. </a>
						</div>
                	@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
