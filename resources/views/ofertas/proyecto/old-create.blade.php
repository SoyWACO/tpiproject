@extends('layouts.app')

@section('title', 'Nuevo proyecto')

@section('content')

	<div class="row">
		<div class="col-md-3">
			@include('layouts.profile')
			<a href="/ofertas/proyecto/create">
				<button class="btn btn-success btn-block">
					<i class="fa fa-plus i-pd" aria-hidden="true"></i>Nuevo proyecto
				</button>
			</a>
			<hr>
			<p style="color: #bbb;">* Campos obligatorios</p>
		</div>
		<div class="col-md-9">
  			<h3>Nuevo proyecto</h3>
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
		
		{!! Form::open(array('url'=>'ofertas/proyecto', 'method'=>'POST', 'autocomplete'=>'off')) !!}
		{{ Form::token() }}
			
			<div class="form-group">
				<label for="nombre" class="control-label">Nombre*</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre del proyecto"></input>
			</div>

			<div class="form-group">
				<label for="descripcion" class="control-label">Descripción*</label>
				<textarea name="descripcion" class="form-control" placeholder="Descripción del proyecto"></textarea>
			</div>

			<div class="form-group">
				<label for="carreras" class="control-label">Carreras*</label>
				<div class="input-group">
					<select name="pid_carrera" id="pid_carrera" class="form-control">
						<option value="">-- Seleccione una carrera --</option>
							@foreach($carreras as $car)
								<option value="{{ $car->id }}">{{ $car->nombre }}</option>
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

			  		</tbody>
				</table>
			</div>

			<div class="form-group text-right">
				<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
				<input name="id_empresa" id="id_empresa" type="hidden" value="{{ Auth::user()->id }}"></input>
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

