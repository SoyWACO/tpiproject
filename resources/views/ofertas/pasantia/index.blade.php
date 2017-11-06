@extends('layouts.app')

@section('title', 'Panel de administración de pasantías')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Panel de administración de pasantías</h3>
				</div>
	  			<div class="panel-body">
					<div class="row" style="padding-top: 20px; padding-bottom: 20px;">
						<div class="col-md-9">
							@include('ofertas.pasantia.search')	
						</div>
						<div class="col-md-3">
				  			<a href="pasantia/create"><button class="btn btn-success btn-block">
				  				<i class="fa fa-plus-circle" aria-hidden="true" style="padding-right: 5px;"></i> Nueva pasantía</button>
				  			</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped table-hover table-bordered table-condensed">
									<thead>
										<tr class="active">
											<th>Id</th>
											<th>Fecha de creación</th>
											<th>Nombre</th>
											<th>Opciones</th>
										</tr>
									</thead>
									@foreach ($pasantias as $pas)
										<tr>
											<td style="vertical-align: middle;">{{ $pas->id }}</td>
											<td style="vertical-align: middle;">{{ $pas->created_at }}</td>
											<td style="vertical-align: middle;">{{ $pas->nombre }}</td>
											<td style="vertical-align: middle; text-align: center;">
												<a href="{{ URL::action('PasantiaController@show', $pas->id) }}">
													<button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></button>
												</a>
												<a href="{{ URL::action('PasantiaController@edit', $pas->id) }}">
													<button class="btn btn-warning"><i class="fa fa-wrench" aria-hidden="true"></i></button>
												</a>
												<a href="" data-target="#modal-delete-{{ $pas->id }}" data-toggle="modal">
													<button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
												</a>
											</td>
										</tr>
										@include('ofertas.pasantia.modal')
									@endforeach
								</table>
							</div>
							{{ $pasantias->render() }}
	  					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection