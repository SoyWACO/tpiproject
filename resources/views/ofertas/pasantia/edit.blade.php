@extends('layouts.app')

@section('title', 'Editar pasantía')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
		  			<h3>Editar pasantía: {{ $pasantia->nombre }}</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
					  		@if (count($errors) > 0)
						  		<div class="alert alert-danger">
						  			<ul>
						  				@foreach ($errors->all() as $error)
						  				<li>{{ $error }}</li>
						  				@endforeach
						  			</ul>
						  		</div>
					  		@endif
					  	</div>
					</div>
					{!! Form::model($pasantia, ['method' => 'PATCH', 'route' => ['ofertas.pasantia.update', $pasantia->id]]) !!}
					{{ Form::token() }}
					
					
						<div class="form-group">
							<div class="col-md-2 alinear">
								<label for="nombre" class="control-label">Nombre:</label>
							</div>
							<div class="col-md-10">
					  			<input type="text" name="nombre" class="form-control mi_margen" placeholder="Nombre de la pasantía" value="{{ $pasantia->nombre }}"></input>
					  		</div>
						</div>
					

						<div class="form-group">
							<div class="col-md-2 alinear">
								<label for="descripcion" class="control-label">Descripción:</label>	
							</div>
							<div class="col-md-10">
					  			<textarea name="descripcion" class="form-control mi_margen" placeholder="Descripción de la pasantía">{{ $pasantia->descripcion }}</textarea>
					  		</div>
						</div>

						<div class="form-group">
							<div class="col-md-2 alinear">
								<label for="sexo" class="control-label">Sexo:</label>
							</div>
							<div class="col-md-10">
							  	<select name="sexo" id="sexo" class="form-control mi_margen">
							  		<option value="{{ $pasantia->sexo }}">Elección actual: {{ $pasantia->sexo }}</option>
							  		<option value="Femenino">Femenino</option>
							  		<option value="Masculino">Masculino</option>
							  		<option value="Indiferente">Indiferente</option>
								</select>
					  		</div>
						</div>

						<div class="form-group">
							<div class="col-md-2 alinear">
								<label for="duracion" class="control-label">Duración:</label>	
							</div>
							<div class="col-md-4">
					  			<input type="number" name="duracion" class="form-control mi_margen" value="{{ $pasantia->duracion }}"></input>
					  		</div>
					  		<div class="col-md-6">
							  	<select name="unidad_duracion" id="unidad_duracion" class="form-control mi_margen">
							  		<option value="{{ $pasantia->unidad_duracion }}">Elección actual: {{ $pasantia->unidad_duracion }}</option>
							  		<option value="Días">Días</option>
							  		<option value="Semanas">Semanas</option>
							  		<option value="Meses">Meses</option>
							  		<option value="Años">Años</option>
								</select>
					  		</div>
						</div>

						<div class="form-group">
							<div class="col-md-2 alinear">
								<label for="edad" class="control-label">Edad:</label>	
							</div>
							<div class="col-md-1">
								<label>De</label>
							</div>
							<div class="col-md-4">
					  			<input type="number" name="edad_inicial" class="form-control mi_margen" value="{{ $pasantia->edad_inicial }}"></input>
					  		</div>
					  		<div class="col-md-1">
								<label>Hasta</label>
							</div>
					  		<div class="col-md-4">
					  			<input type="number" name="edad_final" class="form-control mi_margen" value="{{ $pasantia->edad_final }}"></input>
					  		</div>
						</div>

						<div class="form-group">
							<div class="col-md-2 alinear">
								<label for="idioma" class="control-label">Idioma:</label>
							</div>
							<div class="col-md-10">
					  			<input type="text" name="idioma" class="form-control mi_margen" placeholder="Idiomas requeridos" value="{{ $pasantia->idioma }}"></input>
					  		</div>
						</div>

						<div class="form-group">
							<div class="col-md-2 alinear">
								<label for="pago" class="control-label">Pago:</label>
							</div>
							<div class="col-md-10">
					  			<input type="text" name="pago" class="form-control mi_margen" placeholder="Pago de la pasantía" value="{{ $pasantia->pago }}"></input>
					  		</div>
						</div>
					
						<div class="form-group">
							<div class="col-md-2 alinear">
								<label for="carreras" class="control-label">Carreras:</label>
							</div>
							<div class="col-md-10">
					  			<div class="input-group mi_margen">
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
						</div>
					  				
					  				
					  	<div class="form-group">
					  		<div class="col-md-12">
					  			<table name="carreras" id="carreras" class="table table-striped table-hover table-bordered">
		  						<thead>
		  							<tr class="active">
										<th>Carrera</th>
					  					<th>Eliminar</th>
		  							</tr>
					  			</thead>
					  			<tbody>
					  			@foreach($carreras as $car)
	  								<tr class="selected" id="fila'+cont+'">
	  									<td style="vertical-align: middle;">
	  										<input type="hidden" name="id_carrera[]" value="{{ $car->id }}'">{{ $car->nombre }}
	  									</td>
	  									<td style="vertical-align: middle; text-align: center;">
	  										<button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">x</button>
	  									</td>
	  								</tr>
	  							@endforeach
			  					</tbody>
							</table>
					  		</div>
					  	</div>			
					  	
					  	
					  	<div class="form-group text-right">
					  		<div class="col-md-12">
					  			<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
					  			<input name="id_empresa" id="id_empresa" type="hidden" value="{{ $pasantia->id_empresa }}"></input>
					  			<button class="btn btn-primary" type="submit" id="guardar">Guardar</button>
					  			<button class="btn btn-danger" type="reset">Cancelar</button>
							</div>
					  	</div>	
					  	  			
					{!! Form::close() !!}
					
				</div>
			</div>
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
				var fila = '<tr class="selected" id="fila'+cont+'"><td style="vertical-align: middle;"><input type="hidden" name="id_carrera[]" value="'+id_carrera+'">'+carrera+'</td><td style="vertical-align: middle; text-align: center;"><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">x</button></td></tr>';
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