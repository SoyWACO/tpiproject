@extends('layouts.app')

@section('title', 'Proyectos')

@section('content')
	
	<div class="row">
		<div class="col-md-7">
  			@include('buscar.proyecto.search')
  			<ul class="nav nav-tabs" style="margin-bottom: 25px;">
  				<li role="presentation" class="active"><a href="/buscar/proyecto">Proyectos</a></li>
  				<li role="presentation"><a href="/buscar/pasantia">Pasantías</a></li>
			</ul>
			@foreach ($proyectos as $pro)
				<a href="{{ URL::action('BuscarProyectoController@show', $pro->id) }}">
					<h4>{{ $pro->nombre }}</h4>
				</a>
				<p style="text-align: justify;">
					<span style="color: #bbb;">{{ $pro->created_at }}</span> {{ $pro->descripcion }}
				</p>
				<!--
				<p>
					<i class="fa fa-institution i-pd" aria-hidden="true"></i>Empresa: {{ $pro->empresa }}
				</p>
				<p>
					<i class="fa fa-envelope i-pd" aria-hidden="true"></i>Correo electrónico: <a href="mailto:{{ $pro->email }}">{{ $pro->email }}</a>
				</p>
				<p>
					<i class="fa fa-map-marker i-pd" aria-hidden="true"></i>Ubicación: {{ $pro->ciudad }}
				</p>
				-->
				<hr>
			@endforeach
			<div class="text-center">
				{{ $proyectos->render() }}
			</div>
		</div>
		<div class="col-md-4 col-md-offset-1">
			<div class="panel panel-default">
  				<div class="panel-heading">Proyectos disponibles por carrera</div>
				<div class="list-group">
					@foreach ($carreras as $car)
						@if ($car->proyectos->count() > 0)
  							<a href="{{ route('buscar.search.procarrera', $car->id) }}">
  								<button type="button" class="list-group-item"><span class="badge">{{ $car->proyectos->count() }}</span>{{ $car->nombre }}</button>
  							</a>
	  					@endif
	  				@endforeach
				</div>
			</div>
		</div>
	</div>

@endsection