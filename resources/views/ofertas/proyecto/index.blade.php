@extends('layouts.app')

@section('title', 'Mis proyectos')

@section('content')

	<div class="row">
		<div class="col-md-3">
			@include('layouts.profile')
			<a href="/ofertas/proyecto/create">
				<button class="btn btn-success btn-block">
					<i class="fa fa-plus i-pd" aria-hidden="true"></i>Nuevo proyecto
				</button>
			</a>
		</div>
		<div class="col-md-9">
  			<h3>Mis proyectos</h3>
			<hr>
			<div style="margin-bottom: 20px;">
				@include('ofertas.proyecto.search')
			</div>
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<thead>
						<tr>
							<th>Id</th>
							<th>Fecha de creación</th>
							<th>Nombre</th>
							<th>Opciones</th>
						</tr>
					</thead>
					@foreach ($proyectos as $pro)
						<tr>
							<td style="vertical-align: middle;">{{ $pro->id }}</td>
							<td style="vertical-align: middle;">{{ $pro->created_at }}</td>
							<td style="vertical-align: middle;">{{ $pro->nombre }}</td>
							<td style="vertical-align: middle;">
								<a href="{{ URL::action('ProyectoController@show', $pro->id) }}">
									<button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
								</a>
								<a href="{{ URL::action('ProyectoController@edit', $pro->id) }}">
									<button class="btn btn-warning btn-sm"><i class="fa fa-wrench" aria-hidden="true"></i></button>
								</a>
								<a href="" data-target="#modal-delete-{{ $pro->id }}" data-toggle="modal">
									<button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
								</a>
							</td>
						</tr>
						@include('ofertas.proyecto.modal')
					@endforeach
				</table>
			</div>
			<div class="text-center">
				{{ $proyectos->render() }}
			</div>
		</div>
	</div>

@endsection