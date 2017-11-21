@extends('layouts.app')

@section('title', 'Carreras')

@section('content')
	<div class="row">
		<div class="col-md-3">
			@include('layouts.profile')
		</div>
		<div class="col-md-9">
			<div class="page-header">
		  		<h3>
		  			Panel de administración de carreras <a href="carreras/create"><button class="btn btn-success" style="margin-left: 10px;"><i class="fa fa-plus i-pd" aria-hidden="true"></i>Nueva carrera</button></a>
		  		</h3>
			</div>
			<div>
				@include('administracion.carreras.search')
			</div>
			<div>
				<div class="table-responsive">
					<table class="table table-hover table-condensed">
						<thead>
							<th>Id</th>
							<th>Nombre</th>
							<th>Opciones</th>
						</thead>
						@foreach ($carreras as $car)
						<tr>
							<td style="vertical-align: middle;">{{ $car->id }}</td>
							<td style="vertical-align: middle;">{{ $car->nombre }}</td>
							<td style="vertical-align: middle;">
								<a href="{{ URL::action('CarreraController@edit', $car->id) }}">
									<button class="btn btn-warning btn-sm"><i class="fa fa-wrench" aria-hidden="true"></i></button>
								</a>
								<a href="" data-target="#modal-delete-{{ $car->id }}" data-toggle="modal">
									<button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
								</a>
							</td>
						</tr>
						@include('administracion.carreras.modal')
						@endforeach
					</table>
				</div>
				<div class="text-center">
					{{ $carreras->render() }}	
				</div>
			</div>
		</div>	
	</div>
@endsection