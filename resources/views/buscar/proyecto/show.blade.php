@extends('layouts.app')

@section('title', 'Detalle del proyecto')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Detalle del proyecto: {{ $proyecto->nombre }}</h3>
				</div>
				<div class="panel-body">
					
					<div class="row">
						<div class="col-md-4 alinear">
							<h4>Información del proyecto</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Nombre:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $proyecto->nombre }}</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Fecha de creación:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $proyecto->created_at }}</p>
						</div>
					</div>
							
					<div class="row">
						<div class="col-md-4 alinear">
							<label>Descripcion:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $proyecto->descripcion }}</p>
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
							<p>{{ $proyecto->empresa }}</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Correo electrónico:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $proyecto->email }}</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Teléfono:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $proyecto->telefono }}</p>
						</div>
					</div>
					  			
					<div class="row">
						<div class="col-md-4 alinear">
							<label>Sitio web:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $proyecto->web }}</p>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-4 alinear">
							<label>Sector:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $proyecto->sector }}</p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 alinear">
							<label>Ubicación:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $proyecto->ciudad }}</p>
						</div>
					</div>
					  		
					<div class="row">
						<div class="col-md-4 alinear">
							<label>Dirección:</label>
						</div>
						<div class="col-md-8">
							<p>{{ $proyecto->direccion }}</p>
						</div>
					</div>		
					  			
					  			
				</div>
			</div>
		</div>
	</div>
@endsection