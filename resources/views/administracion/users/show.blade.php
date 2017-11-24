@extends('layouts.app')

@section('title', 'Información del usuario')

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
			<h3>Información del usuario</h3>
			<hr>
			<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $user->name }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Empresa</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $user->empresa }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Sector</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $user->sector }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tipo de usuario</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $user->tipo }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Correo electrónico</label>
					<div class="col-sm-9">
						<a href="mailto:{{ $user->email }}">
							<p class="form-control-static">{{ $user->email }}</p>
						</a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Teléfono</label>
					<div class="col-sm-9">
						<a href="tel:{{ $user->telefono }}">
							<p class="form-control-static">{{ $user->telefono }}</p>
						</a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Sitio web</label>
					<div class="col-sm-9">
						<a href="//{{ $user->web }}" target="_black">
							<p class="form-control-static">{{ $user->web }}</p>
						</a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ubicación</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $user->ciudad }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Dirección</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $user->direccion }}</p>
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection