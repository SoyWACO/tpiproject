@extends('layouts.app')

@section('title', 'Nueva pasantía')

@section('content')

<div class="row">
		<div class="col-md-3">
			@include('layouts.profile')
			<a href="/administracion/pasantia/create">
				<button class="btn btn-success btn-block">
					<i class="fa fa-plus i-pd" aria-hidden="true"></i>Nueva pasantía
				</button>
			</a>
			<hr>
			<p style="color: #bbb;">* Campos obligatorios</p>
		</div>
		<div class="col-md-9">
  			<h3>Nueva pasantía</h3>
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
		
		{!! Form::open(array('url'=>'administracion/pasantia', 'method'=>'POST', 'autocomplete'=>'off')) !!}
		{{ Form::token() }}
			
			<div class="form-group">
				<label for="nombre" class="control-label">Nombre*</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre de la pasantía" value="{{ old('nombre') }}"></input>
			</div>

			<div class="form-group">
				<label for="descripcion" class="control-label">Descripción*</label>
				<textarea name="descripcion" class="form-control" placeholder="Descripción de la pasantía">{{ old('descripcion') }}</textarea>
			</div>

			<div class="form-group">
				<label for="sexo" class="control-label">Sexo*</label>
				<div class="form-inline">
					<select name="sexo" id="sexo" class="form-control" required="true">
						<option value="">-- Seleccione el sexo del aspirante --</option>
						<option value="Femenino">Femenino</option>
						<option value="Masculino">Masculino</option>
						<option value="Indiferente">Indiferente</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="duracion" class="control-label">Duración*</label>
				<div class="form-inline">
					<input type="number" name="duracion" class="form-control" placeholder="Cantidad" value="{{ old('duracion') }}" min="1"></input>
					<select name="unidad_duracion" id="unidad_duracion" class="form-control" required="true">
						<option value="">-- Periodo --</option>
						<option value="Días">Días</option>
						<option value="Semanas">Semanas</option>
						<option value="Meses">Meses</option>
						<option value="Años">Años</option>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="edad" class="control-label">Edad*</label>
				<div class="form-inline">
					<div class="form-group">
						De <input type="number" name="edad_inicial" class="form-control" placeholder="Edad mínima" value="{{ old('edad_inicial') }}" min="18" max="65"></input>
					</div>
					<div class="form-group">
						Hasta <input type="number" name="edad_final" class="form-control" placeholder="Edad máxima" value="{{ old('edad_final') }}" min="18" max="65"></input>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="idioma" class="control-label">Idiomas</label>
				<input type="text" name="idioma" class="form-control" placeholder="Idiomas requeridos" value="{{ old('idioma') }}"></input>
			</div>

			<div class="form-group">
				<label for="pago" class="control-label">Pago</label>
				<div class="form-inline">
					$ <input type="number" name="pago" class="form-control" placeholder="Pago de la pasantía" value="{{ old('pago') }}" min="0.01" step="0.01"></input>
					<select name="tiempo_pago" id="tiempo_pago" class="form-control">
						<option value="">-- Periodo --</option>
						<option value="Diarios">Diarios</option>
						<option value="Semanales">Semanales</option>
						<option value="Quincenales">Quincenales</option>
						<option value="Mensuales">Mensuales</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('carreras', 'Carreras*') !!}
				{!! Form::select('carrera_id[]', $carreras, null, ['class'=>'form-control select-carrera', 'multiple']) !!}
			</div>

			<div class="form-group text-right">
				<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
				<input name="user_id" id="user_id" type="hidden" value="{{ Auth::user()->id }}"></input>
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
					  	  			
		{!! Form::close() !!}

		</div>
	</div>

@push('scripts')
	<script>
		$('.select-carrera').chosen({
			placeholder_text_multiple: 'Seleccione las carreras relacionadas al proyecto'
		});
	</script>
@endpush
@endsection	