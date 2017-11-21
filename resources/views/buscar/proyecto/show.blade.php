@extends('layouts.app')

@section('title', 'Información del proyecto')

@section('content')
	
	<div class="row">
		<div class="col-md-8">
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
		</div>
		<div class="col-md-3 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Información de contacto</h4>
				</div>
					<ul class="list-group">
						<li class="list-group-item">
							<i class="fa fa-institution i-pd" aria-hidden="true"></i>{{ $proyecto->empresa }}
						</li>
						<li class="list-group-item">
							<i class="fa fa-bookmark i-pd" aria-hidden="true"></i>{{ $proyecto->sector }}
						</li>
						<li class="list-group-item">
							<i class="fa fa-envelope i-pd" aria-hidden="true"></i><a href="mailto:{{ $proyecto->email }}">{{ $proyecto->email }}</a>
						</li>
						<li class="list-group-item">
							<i class="fa fa-phone i-pd" aria-hidden="true"></i><a href="tel:{{ $proyecto->telefono }}">{{ $proyecto->telefono }}</a>
						</li>
						<li class="list-group-item">
							<i class="fa fa-globe i-pd" aria-hidden="true"></i><a href="//{{ $proyecto->web }}" target="_black">{{ $proyecto->web }}</a>
						</li>
						<li class="list-group-item">
							<i class="fa fa-map-marker i-pd" aria-hidden="true"></i>{{ $proyecto->ciudad }}
						</li>
						<li class="list-group-item">
							<i class="fa fa-map i-pd" aria-hidden="true"></i>{{ $proyecto->direccion }}
						</li>
					</ul>
			</div>
		</div>
	</div>

@endsection