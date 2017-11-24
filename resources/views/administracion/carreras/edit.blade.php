@extends('layouts.app')

@section('title', 'Editar carrera')

@section('content')
	<div class="row">
		<div class="col-md-3">
			@include('layouts.profile')
			<a href="/administracion/carreras/create">
				<button class="btn btn-success btn-block">
					<i class="fa fa-plus i-pd" aria-hidden="true"></i>Nueva carrera
				</button>
			</a>
			<hr>
			<p style="color: #bbb;">* Campos obligatorios</p>
		</div>
		<div class="col-md-9">
		  	<h3>Editar carrera</h3>
			<hr>
			<div>
				@if (count($errors) > 0)
		  		<div class="alert alert-warning alert-dismissible">
		  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  			<ul>
		  				@foreach ($errors->all() as $error)
		  				<li>{{ $error }}</li>
		  				@endforeach
		  			</ul>
		  		</div>
	  		@endif
			</div>
	  		{!! Form::model($carrera, ['method' => 'PATCH', 'route' => ['administracion.carreras.update', $carrera->id]]) !!}
	  			{{ Form::token() }}
	  			<div class="form-group">
	  				<label for="nombre">Nombre*</label>
	  				<input type="text" name="nombre" class="form-control" placeholder="Nombre del proyecto" value="{{ $carrera->nombre }}"></input>
	  			</div>
	  			<div class="form-group text-right">
	  				<button class="btn btn-primary" type="submit">Guardar</button>
	  				<button class="btn btn-danger" type="reset">Cancelar</button>
	  			</div>
	  		{!! Form::close() !!}
		</div>
	</div>
@endsection