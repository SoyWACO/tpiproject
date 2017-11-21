@extends('layouts.app')

@section('title', 'Editar pasantía')

@section('content')

<div class="row">
		<div class="col-md-3">
			@include('layouts.profile')
			<a href="/ofertas/pasantia/create">
				<button class="btn btn-success btn-block">
					<i class="fa fa-plus i-pd" aria-hidden="true"></i>Nueva pasantía
				</button>
			</a>
			<hr>
			<p style="color: #bbb;">* Campos obligatorios</p>
		</div>
		<div class="col-md-9">
  			<h3>Editar pasantía</h3>
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
		
		{!! Form::model($pasantia, ['method' => 'PATCH', 'route' => ['ofertas.pasantia.update', $pasantia->id]]) !!}
		{{ Form::token() }}
			
			<div class="form-group">
				<label for="nombre" class="control-label">Nombre*</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre de la pasantía" value="{{ $pasantia->nombre }}"></input>
			</div>

			<div class="form-group">
				<label for="descripcion" class="control-label">Descripción*</label>
				<textarea name="descripcion" class="form-control" placeholder="Descripción de la pasantía">{{ $pasantia->descripcion }}</textarea>
			</div>

			<div class="form-group">
				{!! Form::label('sexo', 'Sexo*') !!}
				{!! Form::select('sexo', array('Femenino'=>'Femenino', 'Masculino'=>'Masculino', 'Indiferente'=>'Indiferente'), $pasantia->sexo, ['class'=>'form-control', 'placeholder'=>'-- Seleccione el sexo del aspirante --']) !!}
			</div>
			
			<div class="form-group">
				<label for="duracion" class="control-label">Duración*</label>
				<div class="form-inline">
					<input type="number" name="duracion" class="form-control" placeholder="Cantidad" value="{{ $pasantia->duracion }}"></input>
					{!! Form::select('unidad_duracion', array('Días'=>'Días', 'Semanas'=>'Semanas', 'Meses'=>'Meses', 'Años'=>'Años'), $pasantia->unidad_duracion, ['class'=>'form-control', 'placeholder'=>'-- Periodo --']) !!}
				</div>
			</div>
			
			<div class="form-group">
				<label for="edad" class="control-label">Edad*</label>
				<div class="form-inline">
					<div class="form-group">
						De <input type="number" name="edad_inicial" class="form-control" placeholder="Edad mínima" value="{{ $pasantia->edad_inicial }}"></input>
					</div>
					<div class="form-group">
						Hasta <input type="number" name="edad_final" class="form-control" placeholder="Edad máxima" value="{{ $pasantia->edad_final }}"></input>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label for="idioma" class="control-label">Idiomas</label>
				<input type="text" name="idioma" class="form-control" placeholder="Idiomas requeridos" value="{{ $pasantia->idioma }}"></input>
			</div>

			<div class="form-group">
				<label for="pago" class="control-label">Pago</label>
				<div class="form-inline">
					$ <input type="number" name="pago" class="form-control" placeholder="Pago de la pasantía" value="{{ $pasantia->pago }}"></input>
					{!! Form::select('tiempo_pago', array('Diarios'=>'Diarios', 'Semanales'=>'Semanales', 'Quincenales'=>'Quincenales', 'Mensuales'=>'Mensuales'), $pasantia->tiempo_pago, ['class'=>'form-control', 'placeholder'=>'-- Periodo --']) !!}
				</div>
			</div>

			<div class="form-group">
				{!! Form::label('carreras', 'Carreras*') !!}
				{!! Form::select('carrera_id[]', $tcarreras, $carreras, ['class'=>'form-control select-carrera', 'multiple']) !!}
			</div>

			<div class="form-group text-right">
				<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
				<input name="user_id" id="user_id" type="hidden" value="{{ $pasantia->user_id }}"></input>
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