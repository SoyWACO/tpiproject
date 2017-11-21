@extends('layouts.app')

@section('title', 'Pasantías')

@section('content')

	<div class="row">
		<div class="col-md-7">
  			@include('buscar.pasantia.search')
  			<ul class="nav nav-tabs" style="margin-bottom: 25px;">
  				<li role="presentation"><a href="/buscar/proyecto">Proyectos</a></li>
  				<li role="presentation" class="active"><a href="/buscar/pasantia">Pasantías</a></li>
			</ul>
			@foreach ($pasantias as $pas)
				<a href="{{ URL::action('BuscarPasantiaController@show', $pas->id) }}">
					<h4>{{ $pas->nombre }}</h4>
				</a>
				<p style="text-align: justify;">
					<span style="color: #bbb;">{{ $pas->created_at }}</span> {{ $pas->descripcion }}
				</p>
				<!--
				<p>
					<i class="fa fa-institution i-pd" aria-hidden="true"></i>Empresa: {{ $pas->empresa }}
				</p>
				<p>
					<i class="fa fa-envelope i-pd" aria-hidden="true"></i>Correo electrónico: <a href="mailto:{{ $pas->email }}">{{ $pas->email }}</a>
				</p>
				<p>
					<i class="fa fa-map-marker i-pd" aria-hidden="true"></i>Ubicación: {{ $pas->ciudad }}
				</p>
				-->
				<hr>
			@endforeach
			<div class="text-center">
				{{ $pasantias->render() }}
			</div>
		</div>
		<div class="col-md-4 col-md-offset-1">
			<div class="panel panel-default">
  				<div class="panel-heading">Pasantías disponibles por carrera</div>
				<div class="list-group">
					@foreach ($carreras as $car)
						@if ($car->pasantias->count() > 0)
							<a href="{{ route('buscar.search.pascarrera', $car->id) }}">
	  							<button type="button" class="list-group-item"><span class="badge">{{ $car->pasantias->count() }}</span>{{ $car->nombre }}</button>
	  						</a>
	  					@endif
	  				@endforeach
				</div>
			</div>
		</div>
	</div>

@endsection