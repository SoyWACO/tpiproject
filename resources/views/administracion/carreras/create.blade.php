@extends('layouts.app')

@section('title', 'Nueva carrera')

@section('content')
	<div class="row">
		<div class="col-md-3">
			@include('layouts.profile')
			<hr>
			<p style="color: #bbb;">* Campos obligatorios</p>
		</div>
		<div class="col-md-9">
			<div class="page-header">
		  		<h3>Nueva carrera</h3>
			</div>
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
	  		{!! Form::open(array('url'=>'administracion/carreras', 'method'=>'POST', 'autocomplete'=>'off')) !!}
	  			{{ Form::token() }}
	  			<div class="form-group">
	  				<label for="nombre">Nombre*</label>
	  				<input type="text" name="nombre" class="form-control" placeholder="Nombre de la carrera"></input>
	  			</div>
	  			<div class="form-group text-right">
	  				<button class="btn btn-primary" type="submit">Guardar</button>
	  				<button class="btn btn-danger" type="reset">Cancelar</button>
	  			</div>
	  		{!! Form::close() !!}
		</div>
	</div>
@endsection