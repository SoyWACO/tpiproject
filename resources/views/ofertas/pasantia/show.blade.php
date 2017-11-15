@extends('layouts.app')

@section('title', 'Información de la pasantía')

@section('content')
	
	<div class="row">
		<div class="col-md-3">
			@include('layouts.profile')
			<a href="/ofertas/pasantia/create">
				<button class="btn btn-success btn-block">
					<i class="fa fa-plus i-pd" aria-hidden="true"></i>Nueva pasantía
				</button>
			</a>
		</div>
		<div class="col-md-9">
			<h3>Información de la pasantía</h3>
			<hr>
			<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $pasantia->nombre }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Fecha de publicación</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $pasantia->created_at }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Descripción</label>
					<div class="col-sm-9">
						<p class="form-control-static" style="text-align: justify;">{{ $pasantia->descripcion }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Sexo</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $pasantia->sexo }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Duración</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $pasantia->duracion }} {{ $pasantia->unidad_duracion }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Edad</label>
					<div class="col-sm-9">
						<p class="form-control-static">De {{ $pasantia->edad_inicial }} a {{ $pasantia->edad_final }} años</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Idioma</label>
					<div class="col-sm-9">
						@if ($pasantia->idioma != "")
							<p class="form-control-static">{{ $pasantia->idioma }}</p>
						@else
							<p class="form-control-static">No se requiere idioma adicional</p>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Pago</label>
					<div class="col-sm-9">
						@if ($pasantia->pago != "")
							<p class="form-control-static">$ {{ $pasantia->pago }}</p>
						@else
							<p class="form-control-static">No remunerada</p>
						@endif
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
						<p class="form-control-static">{{ $pasantia->empresa }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Sector</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $pasantia->sector }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Correo electrónico</label>
					<div class="col-sm-9">
						<a href="mailto:{{ $pasantia->email }}">
							<p class="form-control-static">{{ $pasantia->email }}</p>
						</a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Teléfono</label>
					<div class="col-sm-9">
						<a href="tel:{{ $pasantia->telefono }}">
							<p class="form-control-static">{{ $pasantia->telefono }}</p>
						</a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Sitio web</label>
					<div class="col-sm-9">
						<a href="//{{ $pasantia->web }}">
							<p class="form-control-static">{{ $pasantia->web }}</p>
						</a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ubicación</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $pasantia->ciudad }}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Dirección</label>
					<div class="col-sm-9">
						<p class="form-control-static">{{ $pasantia->direccion }}</p>
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection