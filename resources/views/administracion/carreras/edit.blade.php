@extends('layouts.app')

@section('title', 'Carreras | Editar carrera')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="page-header">
		  		<h3>
		  			Panel de administración de carreras
		  		</h3>
			</div>
	  		@if (count($errors) > 0)
	  		<div class="alert alert-danger">
	  			<ul>
	  				@foreach ($errors->all() as $error)
	  				<li>{{ $error }}</li>
	  				@endforeach
	  			</ul>
	  		</div>
	  		@endif
	  		{!! Form::model($carrera, ['method' => 'PATCH', 'route' => ['administracion.carreras.update', $carrera->id]]) !!}
	  			{{ Form::token() }}
	  			<div class="form-group">
	  				<label for="nombre">Nombre</label>
	  				<input type="text" name="nombre" class="form-control" placeholder="Nombre del proyecto" value="{{ $carrera->nombre }}"></input>
	  			</div>
	  			<div class="form-group">
	  				<button class="btn btn-primary" type="submit">Guardar</button>
	  				<button class="btn btn-danger" type="reset">Cancelar</button>
	  			</div>
	  		{!! Form::close() !!}
		</div>
	</div>
@endsection