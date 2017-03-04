@extends('layouts.app')
@section('content')
    <div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
            <div class="panel-heading">Listado de Empresas</div>
            <div class="panel-body">
				<div class="container-fluid">
					<ul class="list-group">
						@foreach ($empresas as $empresa)
						  <li class="list-group-item">
						    <span class="pull-right">
								<a href="">	
						    		<span class="fui-new" title="Editar Empresa"></span>
						    	</a>
								<a href="">	
						    		<span class="fui-export" title="Compartir Empresa"></span>
						    	</a>
						    </span>
						    <a href="{{ url('empresas').'/'.$empresa->id }}" 
						    title="Ir a empresa"> {{ $empresa->drs }} </a>
						  </li>
						@endforeach
					</ul>
				</div>

            </div>
        </div>
    </div>
@endsection