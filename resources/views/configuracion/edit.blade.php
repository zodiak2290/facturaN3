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
											<a href="#cert" data-toggle="tab" title="Cargar CSD">
											<span class="round-tabs one">
											<i class="fui-folder"></i>
											</span> 
											</a>
										</li>
										<li>
											<a href="#profile" data-toggle="tab" title="Cargarrrr logotipo">
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
											<a href="#doner" data-toggle="tab" title="Ir a empresa">
											<span class="round-tabs five">
											<i class="fui-check-circle"></i>
											</span> </a>
										</li>
									</ul>
								</div>

								<div class="tab-content">
									<div class="tab-pane fade in active" id="cert">
											@include('configuracion.cargacert')							
									</div>
									<div class="tab-pane fade" id="profile">
									<h3 class="head text-center">Create a Bootsnipp<sup>™</sup> Profile</h3>
									<p class="narrow text-center">
									Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
									</p>

									<p class="text-center">
									<a href="" class="btn btn-success btn-outline-rounded green"> create your profile <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
									</p>

									</div>
									<div class="tab-pane fade" id="settings">
									<h3 class="head text-center">Drop comments!</h3>
									<p class="narrow text-center">
									Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
									</p>

									<p class="text-center">
									<a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
									</p>
									</div>
									<div class="tab-pane fade" id="doner">
									<div class="text-center">
									<i class="img-intro icon-checkmark-circle"></i>
									</div>
									<h3 class="head text-center">thanks for staying tuned! <span style="color:#f48260;">♥</span> Bootstrap</h3>
									<p class="narrow text-center">
									Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
									</p>
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