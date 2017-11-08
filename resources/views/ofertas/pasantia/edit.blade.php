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
				<label for="sexo" class="control-label">Sexo*</label>
				<div class="form-inline">
					<select name="sexo" id="sexo" class="form-control">
						<option value="{{ $pasantia->sexo }}">Elección actual: {{ $pasantia->sexo }}</option>
						<option value="Femenino">Femenino</option>
						<option value="Masculino">Masculino</option>
						<option value="Indiferente">Indiferente</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="duracion" class="control-label">Duración*</label>
				<div class="form-inline">
					<input type="number" name="duracion" class="form-control" placeholder="Cantidad" value="{{ $pasantia->duracion }}"></input>
					<select name="unidad_duracion" id="unidad_duracion" class="form-control">
						<option value="{{ $pasantia->unidad_duracion }}">Elección actual: {{ $pasantia->unidad_duracion }}</option>
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
						<label>De</label>
						<input type="number" name="edad_inicial" class="form-control" placeholder="Edad mínima" value="{{ $pasantia->edad_inicial }}"></input>
					</div>
					<div class="form-group">
						<label>Hasta</label>
						<input type="number" name="edad_final" class="form-control" placeholder="Edad máxima" value="{{ $pasantia->edad_final }}"></input>
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
					<input type="number" name="pago" class="form-control" placeholder="Pago de la pasantía" value="{{ $pasantia->pago }}"></input>
				</div>
			</div>

			<div class="form-group">
				<label for="carreras" class="control-label">Carreras*</label>
				<div class="input-group">
					<select name="pid_carrera" id="pid_carrera" class="form-control">
						<option value="">-- Seleccione una carrera --</option>
							@foreach($tcarreras as $tcar)
								<option value="{{ $tcar->id }}">{{ $tcar->nombre }}</option>
							@endforeach
					</select>
					<span class="input-group-btn">
						<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
					</span>
				</div>
			</div>

			<div class="form-group">
				<table name="carreras" id="carreras" class="table table-hover table-condensed">
		  			<thead>
		  				<tr>
							<th>Carrera seleccionada</th>
					  		<th>Eliminar</th>
		  				</tr>
					</thead>
					<tbody>

						<!-- Inicio de la wea que no sirve (no más es para ver si mostraba las carreras ya registradas por el momento, no las edita) -->
					  	@foreach($carreras as $car)
	  						<tr class="selected" id="fila'+cont+'">
	  							<td style="vertical-align: middle;">
									<input type="hidden" name="id_carrera[]" value="{{ $car->id }}'">{{ $car->nombre }}
	  							</td>
	  							<td style="vertical-align: middle;">
	  								<button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');">x</button>
	  							</td>
							</tr>
						@endforeach
						<!-- FIn de la wea que no sirve -->

			  		</tbody>
				</table>
			</div>

			<div class="form-group text-right">
				<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
				<input name="id_empresa" id="id_empresa" type="hidden" value="{{ $pasantia->id_empresa }}"></input>
				<button class="btn btn-primary" type="submit" id="guardar">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
					  	  			
		{!! Form::close() !!}

		</div>
	</div>

@push('scripts')
	<script>
		$(document).ready(function() {
			$('#bt_add').click(function() {
				agregar();
			});
		});

		var cont = 0;
		total = 0;
		$("#guardar").hide();
		
		function agregar() {
			id_carrera = $("#pid_carrera").val();
			carrera = $("#pid_carrera option:selected").text();
			if (id_carrera != "") {
				var fila = '<tr class="selected" id="fila'+cont+'"><td style="vertical-align: middle;"><input type="hidden" name="id_carrera[]" value="'+id_carrera+'">'+carrera+'</td><td style="vertical-align: middle;"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');">x</button></td></tr>';
				cont++;
				limpiar();
				total++;
				evaluar();
				$('#carreras').append(fila);
			} else {
				alert("Error al ingresar la carrera");
			}
		}
		
		function limpiar() {
			$("#pid_carrera").val("");
		}

		function evaluar() {
			if (total > 0) {
				$("#guardar").show();
			} else {
				$("#guardar").hide();
			}
		}

		function eliminar(index) {
			total = total - 1;
			$('#fila' + index).remove();
			evaluar();
		}
	</script>
@endpush
@endsection