@extends('layouts.app')

@section('title', 'Detalle de la pasantía')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Detalle del proyecto: {{ $pasantia->nombre }}</h3>
				</div>
				<div class="panel-body">
					
					<div class="row">
						<div class="col-md-4 alinear">
							<h4>Información de la pasantía</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Nombre:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $pasantia->nombre }}</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Fecha de creación:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $pasantia->created_at }}</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Descripcion:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $pasantia->descripcion }}</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Sexo:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $pasantia->sexo }}</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Duración:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $pasantia->duracion }} {{ $pasantia->unidad_duracion }}</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Edad:</label>
						</div>
						<div class="col-md-8">
							<p>De {{ $pasantia->edad_inicial }} a {{ $pasantia->edad_final }} años</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Idioma:</label>
						</div>
						<div class="col-md-8">
						@if ($pasantia->idioma != "")
							<p>{{ $pasantia->idioma }}</p>
						@else
							<p>No se requiere idioma adicional</p>
						@endif
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Pago:</label>
						</div>
						<div class="col-md-8">
						@if ($pasantia->pago != "")
							<p>$ {{ $pasantia->pago }}</p>
						@else
							<p>No remunerada</p>
						@endif
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-4 alinear">
							<label>Carreras:</label>
						</div>
						<div class="col-md-8">
							@foreach($carreras as $car)
							<p>{{ $car->carrera }}</p>
							@endforeach
						</div>
					</div>		

					<div class="row">
						<div class="col-md-4 alinear">
							<h4>Información de la empresa</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Nombre:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $pasantia->empresa }}</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Correo electrónico:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $pasantia->email }}</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Teléfono:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $pasantia->telefono }}</p>
						</div>
					</div>
					  			
					<div class="row">
						<div class="col-md-4 alinear">
							<label>Sitio web:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $pasantia->web }}</p>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-4 alinear">
							<label>Sector:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $pasantia->sector }}</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Ubicación:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $pasantia->ciudad }}</p>
						</div>
					</div>
					  		
					<div class="row">
						<div class="col-md-4 alinear">
							<label>Dirección:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $pasantia->direccion }}</p>
						</div>
					</div>		
					  			
					  			
				</div>
			</div>
		</div>
	</div>
@endsection