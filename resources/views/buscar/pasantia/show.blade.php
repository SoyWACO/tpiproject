@extends('layouts.app')

@section('title', 'Información de la pasantía')

@section('content')
	
	<div class="row">
		<div class="col-md-8">
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
							<p class="form-control-static">$ {{ $pasantia->pago }} {{ $pasantia->tiempo_pago }}</p>
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
		</div>
		<div class="col-md-3 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Información de contacto</h4>
				</div>
					<ul class="list-group">
						<li class="list-group-item">
							<i class="fa fa-institution i-pd" aria-hidden="true"></i>{{ $pasantia->empresa }}
						</li>
						<li class="list-group-item">
							<i class="fa fa-bookmark i-pd" aria-hidden="true"></i>{{ $pasantia->sector }}
						</li>
						<li class="list-group-item">
							<i class="fa fa-envelope i-pd" aria-hidden="true"></i><a href="mailto:{{ $pasantia->email }}">{{ $pasantia->email }}</a>
						</li>
						<li class="list-group-item">
							<i class="fa fa-phone i-pd" aria-hidden="true"></i><a href="tel:{{ $pasantia->telefono }}">{{ $pasantia->telefono }}</a>
						</li>
						<li class="list-group-item">
							<i class="fa fa-globe i-pd" aria-hidden="true"></i><a href="//{{ $pasantia->web }}" target="_black">{{ $pasantia->web }}</a>
						</li>
						<li class="list-group-item">
							<i class="fa fa-map-marker i-pd" aria-hidden="true"></i>{{ $pasantia->ciudad }}
						</li>
						<li class="list-group-item">
							<i class="fa fa-map i-pd" aria-hidden="true"></i>{{ $pasantia->direccion }}
						</li>
					</ul>
			</div>
		</div>
	</div>

@endsection