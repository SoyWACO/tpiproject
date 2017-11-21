@extends('layouts.app')

@section('title', 'Pasantías')

@section('content')

	<div class="row">
		<div class="col-md-3">
			@include('layouts.profile')
			<a href="pasantia/create">
				<button class="btn btn-success btn-block">
					<i class="fa fa-plus i-pd" aria-hidden="true"></i>Nueva pasantía
				</button>
			</a>
		</div>
		<div class="col-md-9">
  			<h3>Panel de administración de pasantías</h3>
			<hr>
			<div style="margin-bottom: 20px;">
				@include('administracion.pasantia.search')
			</div>
			<div class="table-responsive">
				<table class="table table-hover table-condensed">
					<thead>
						<tr>
							<th>Id</th>
							<th>Fecha de creación</th>
							<th>Usuario</th>
							<th>Empresa</th>
							<th>Nombre</th>
							<th>Opciones</th>
						</tr>
					</thead>
					@foreach ($pasantias as $pas)
						<tr>
							<td style="vertical-align: middle;">{{ $pas->id }}</td>
							<td style="vertical-align: middle;">{{ $pas->created_at }}</td>
							<td style="vertical-align: middle;">{{ $pas->name }}</td>
							<td style="vertical-align: middle;">{{ $pas->empresa }}</td>
							<td style="vertical-align: middle;">{{ $pas->nombre }}</td>
							<td style="vertical-align: middle;">
								<a href="{{ URL::action('AdmPasantiaController@show', $pas->id) }}">
									<button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
								</a>
								<a href="{{ URL::action('AdmPasantiaController@edit', $pas->id) }}">
									<button class="btn btn-warning btn-sm"><i class="fa fa-wrench" aria-hidden="true"></i></button>
								</a>
								<a href="" data-target="#modal-delete-{{ $pas->id }}" data-toggle="modal">
									<button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
								</a>
							</td>
						</tr>
						@include('administracion.pasantia.modal')
					@endforeach
				</table>
			</div>
			<div class="text-center">
				{{ $pasantias->render() }}
			</div>
		</div>
	</div>

@endsection