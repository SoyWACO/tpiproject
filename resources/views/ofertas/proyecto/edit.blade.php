@extends('layouts.app')

@section('title', 'Editar proyecto')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
		  			<h3>Editar proyecto: {{ $proyecto->nombre }}</h3>
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
					{!! Form::model($proyecto, ['method' => 'PATCH', 'route' => ['ofertas.proyecto.update', $proyecto->id]]) !!}
					{{ Form::token() }}
					
					
						<div class="form-group">
							<div class="col-md-2 alinear">
								<label for="nombre" class="control-label">Nombre:</label>
							</div>
							<div class="col-md-10">
					  			<input type="text" name="nombre" class="form-control mi_margen" placeholder="Nombre del proyecto" value="{{ $proyecto->nombre }}"></input>
					  		</div>
						</div>
					

						<div class="form-group">
							<div class="col-md-2 alinear">
								<label for="descripcion" class="control-label">Descripción:</label>	
							</div>
							<div class="col-md-10">
					  			<textarea name="descripcion" class="form-control mi_margen" placeholder="Descripción del proyecto">{{ $proyecto->descripcion }}</textarea>
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
					  			<!-- Inicio de la wea que no sirve (no más es para ver si mostraba las carreras ya registradas por el momento, no las edita) -->
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
	  							<!-- Fin de la wea que no sirve -->
			  					</tbody>
							</table>
					  		</div>
					  	</div>			
					  	
					  	
					  	<div class="form-group text-right">
					  		<div class="col-md-12">
					  			<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
					  			<input name="id_empresa" id="id_empresa" type="hidden" value="{{ $proyecto->id_empresa }}"></input>
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