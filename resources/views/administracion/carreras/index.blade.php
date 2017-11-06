@extends('layouts.app')

@section('title', 'Carreras | Inicio')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="page-header">
		  		<h3>
		  			Panel de administración de carreras <a href="carreras/create"><button class="btn btn-success">Nuevo</button></a>
		  		</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				@include('administracion.carreras.search')	
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Opciones</th>
					</thead>
					@foreach ($carreras as $car)
					<tr>
						<td>{{ $car->id }}</td>
						<td>{{ $car->nombre }}</td>
						<td class="text-center">
							<a href="{{ URL::action('CarreraController@edit', $car->id) }}">
								<button class="btn btn-warning">Editar</button>
							</a>
							<a href="" data-target="#modal-delete-{{ $car->id }}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('administracion.carreras.modal')
					@endforeach
				</table>
			</div>
			{{ $carreras->render() }}
		</div>
	</div>
@endsection