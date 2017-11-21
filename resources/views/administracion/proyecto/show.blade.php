@extends('layouts.app')

@section('title', 'Información del proyecto')

@section('content')

	<div class="row">
		<div class="col-md-3">
			@include('layouts.profile')
			<a href="/administracion/proyecto/create">
				<button class="btn btn-success btn-block">
					<i class="fa fa-plus i-pd" aria-hidden="true"></i>Nuevo proyecto
				</button>
			</a>
		</div>
		<div class="col-md-9">
			<h3>Información del proyecto</h3>
			<hr>
			<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $proyecto->nombre }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Fecha de publicación</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $proyecto->created_at }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Descripción</label>
					<div class="col-sm-9">
						<p class="form-control-static" style="text-align: justify;">{{ $proyecto->descripcion }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Carreras</label>
					<div class="col-sm-9">
						@foreach($carreras as $car)
							<p class="form-control-static">{{ $car->carrera }}</p>
						@endforeach
					</div>
				</div>
			</form>
			<h3>Información de la empresa</h3>
			<hr>
			<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $proyecto->empresa }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Sector</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $proyecto->sector }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Correo electrónico</label>
					<div class="col-sm-9">
						<a href="mailto:{{ $proyecto->email }}">
							<p class="form-control-static">{{ $proyecto->email }}</p>
						</a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Teléfono</label>
					<div class="col-sm-9">
						<a href="tel:{{ $proyecto->telefono }}">
							<p class="form-control-static">{{ $proyecto->telefono }}</p>
						</a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Sitio web</label>
					<div class="col-sm-9">
						<a href="//{{ $proyecto->web }}" target="_black">
							<p class="form-control-static">{{ $proyecto->web }}</p>
						</a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ubicación</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $proyecto->ciudad }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Dirección</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $proyecto->direccion }}</p>
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection