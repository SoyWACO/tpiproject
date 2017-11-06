@extends('layouts.app')

@section('title', 'Proyectos')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading" style="padding-top: 20px; padding-bottom: 0; border-bottom: 0;">
					@include('buscar.proyecto.search')
					<ul class="nav nav-tabs">
  						<li role="presentation" class="active"><a href="proyecto">Proyectos</a></li>
  						<li role="presentation"><a href="pasantia">Pasantías</a></li>
					</ul>
				</div>
	  			<div class="panel-body">
	  				@foreach ($proyectos as $pro)
					<div class="bs-callout">
						<a href="{{ URL::action('BuscarProyectoController@show', $pro->id) }}"><h4 style="color: #1b809e; margin-bottom: 15px;">{{ $pro->nombre }}</h4></a>
						<p><span style="color: #bbb;">{{ $pro->created_at }}</span> {{ $pro->descripcion }}</p>
						<p><i class="fa fa-institution" aria-hidden="true"></i> Empresa: {{ $pro->empresa }}</p>
						<p><i class="fa fa-envelope" aria-hidden="true"></i> Correo electrónico: {{ $pro->email }}</p>
					</div>
					@endforeach
					{{ $proyectos->render() }}
				</div>
			</div>
		</div>
	</div>

@endsection