@extends('layouts.app')

@section('title', 'Editar proyecto')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="page-header">
		  		<h3>
		  			Editar proyecto: {{ $proyecto->nombre }}
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
	  		{!! Form::model($proyecto, ['method' => 'PATCH', 'route' => ['ofertas.proyecto.update', $proyecto->id]]) !!}
	  			{{ Form::token() }}
	  			<div class="form-group">
	  				<label for="nombre">Nombre</label>
	  				<input type="text" name="nombre" class="form-control" placeholder="Nombre del proyecto" value="{{ $proyecto->nombre }}"></input>
	  			</div>
	  			<div class="form-group">
	  				<label for="descripcion">Descripción</label>
	  				<textarea name="descripcion" class="form-control" placeholder="Descripción del proyecto">{{ $proyecto->descripcion }}</textarea>
	  			</div>
	  			<div class="form-group">
	  				<label for="carreras">Carreras</label>
	  				<div class="input-group">
	  				<!-- selectpicker" data-live-search="true" -->
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
	  				<div class="form-group">
	  					<table name="carreras" id="carreras" class="table table-striped table-hover">
	  						<thead>
	  							<th>Carrera</th>
	  							<th>Eliminar</th>
	  						</thead>
	  						<tbody>
	  						@foreach($carreras as $car)
	  							<tr class="selected" id="fila'+cont+'">
	  								<td>
	  									<input type="hidden" name="id_carrera[]" value="{{ $car->id }}'">{{ $car->nombre }}
	  								</td>
	  								<td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">x</button></td></tr>
	  							</tr>
	  						@endforeach
	  						</tbody>
	  					</table>
	  				</div>
	  			</div>
	  			<div class="form-group text-right">
				  	<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
				  	<input name="id_empresa" id="id_empresa" type="hidden" value="{{ $proyecto->id_empresa }}"></input>
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
				var fila = '<tr class="selected" id="fila'+cont+'"><td><input type="hidden" name="id_carrera[]" value="'+id_carrera+'">'+carrera+'</td><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">x</button></td></tr>';
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