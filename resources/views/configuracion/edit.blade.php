@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
            <div class="panel-heading">Asistente de configuración</div>
            <div class="panel-body">
				<div class="container-fluid">
					<section >
						<div class="container-fluid">
							<div class="row">
								<div class="board">
									<div class="board-inner" style="background:#ECF0F1;">
										<ul class="nav nav-tabs" id="myTab">
											<div class="liner"></div>
											<li class="active" >
												<a href="#cert" data-toggle="tab" title="Cargar CSD"  @if( $hasSello ) style="color: #3498DB" @else style="color: #C0392B"  @endif>
												<span class="round-tabs one">
												<i class="fui-folder"></i>
												</span> 
												</a>
											</li>
											<li>
												<a href="#profile" data-toggle="tab" title="Cargarrrr logotipo"  @if( $hasLogo ) style="color: #3498DB" @else style="color: #C0392B"  @endif>
												<span class="round-tabs two">
												<i class="fui-image"></i>
												</span> 
												</a>
											</li>
											<li>
												<a href="#settings" data-toggle="tab" title="Configuración general">
												<span class="round-tabs four">
												<i class="fui-gear"></i>
												</span> 
												</a>
											</li>
											<li>
												<a @if( $hasSello && $hasLogo )  
														href="#doner" data-toggle="tab" style="color: #3498DB" 
													@else 
														style="color: #C0392B"  

													@endif title="Ir a empresa" >
													<span class="round-tabs five">
													<i class="fui-check-circle"></i>
													</span> 
												</a>
											</li>
										</ul>
									</div>

									<div class="tab-content">
										<div class="tab-pane fade in active" id="cert">
											@include('configuracion.cargacert')	
										</div>
										<div class="tab-pane fade" id="profile">
											@include('configuracion.cargaLogo')
										</div>
										<div class="tab-pane fade" id="settings">
											
										</div>
										<div class="tab-pane fade" id="doner">

										</div>
										<div class="clearfix"></div>
									</div>

								</div>
							</div>
						</div>
					</section>

				</div>
            </div>
        </div>
    </div>
@endsection