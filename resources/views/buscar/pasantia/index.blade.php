@extends('layouts.app')

@section('title', 'Pasantías')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading" style="padding-top: 20px; padding-bottom: 0; border-bottom: 0;">
					@include('buscar.pasantia.search')
					<ul class="nav nav-tabs">
  						<li role="presentation"><a href="proyecto">Proyectos</a></li>
  						<li role="presentation" class="active"><a href="pasantia">Pasantías</a></li>
					</ul>
				</div>
	  			<div class="panel-body">
	  				@foreach ($pasantias as $pas)
					<div class="bs-callout">
						<a href="{{ URL::action('BuscarPasantiaController@show', $pas->id) }}"><h4 style="color: #1b809e; margin-bottom: 15px;">{{ $pas->nombre }}</h4></a>
						<p><span style="color: #bbb;">{{ $pas->created_at }}</span> {{ $pas->descripcion }}</p>
						<p><i class="fa fa-institution" aria-hidden="true"></i> Empresa: {{ $pas->empresa }}</p>
						<p><i class="fa fa-envelope" aria-hidden="true"></i> Correo electrónico: {{ $pas->email }}</p>
					</div>
					@endforeach
					{{ $pasantias->render() }}
				</div>
			</div>
		</div>
	</div>

@endsection