@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
	<div class="row">
		<div class="col-md-3">
			@include('layouts.profile')
			<a href="/administracion/users/create">
                <button class="btn btn-success btn-block">
                    <i class="fa fa-plus i-pd" aria-hidden="true"></i>Nuevo usuario
                </button>
            </a>
		</div>
		<div class="col-md-9">
		  	<h3>Panel de administración de usuarios</h3>
			<hr>
			<div style="margin-bottom: 20px;">
				@include('administracion.users.search')
			</div>
			<div>
				<div class="table-responsive">
					<table class="table table-hover table-condensed">
						<thead>
							<th>Id</th>
							<th>Nombre</th>
							<th>Empresa</th>
							<th>Correo</th>
							<th>Tipo</th>
							<th>Opciones</th>
						</thead>
						@foreach ($users as $use)
						<tr>
							<td style="vertical-align: middle;">{{ $use->id }}</td>
							<td style="vertical-align: middle;">{{ $use->name }}</td>
							<td style="vertical-align: middle;">{{ $use->empresa }}</td>
							<td style="vertical-align: middle;">{{ $use->email }}</td>
							<td style="vertical-align: middle;">
								@if ($use->tipo == "Administrador")
								<span class="label label-danger">{{ $use->tipo }}</span>
								@else
								<span class="label label-primary">{{ $use->tipo }}</span>
								@endif
							</td>
							<td style="vertical-align: middle;">
								<a href="{{ URL::action('UserController@show', $use->id) }}">
									<button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button>
								</a>
								<a href="{{ URL::action('UserController@edit', $use->id) }}">
									<button class="btn btn-warning btn-sm"><i class="fa fa-wrench" aria-hidden="true"></i></button>
								</a>
								<a href="" data-target="#modal-delete-{{ $use->id }}" data-toggle="modal">
									<button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
								</a>
							</td>
						</tr>
						@include('administracion.users.modal')
						@endforeach
					</table>
				</div>
				<div class="text-center">
					{{ $users->render() }}	
				</div>
			</div>
		</div>	
	</div>
@endsection