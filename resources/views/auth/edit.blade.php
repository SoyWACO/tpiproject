@extends('layouts.app')

@section('title', 'Editar usuario')

@section('content')
	<div class="row">
		<div class="col-md-3">
			@include('layouts.profile')
			<hr>
			<p style="color: #bbb;">* Campos obligatorios</p>
		</div>
		<div class="col-md-9">
		  	<h3>Editar usuario</h3>
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
	  		{!! Form::model($user, ['method' => 'PATCH', 'route' => ['auth.update', $user->id]]) !!}
	  			{{ Form::token() }}
	  			
	  			<div class="form-group">
                    <label for="name">Nombre*</label>
                    <input type="text" name="name" class="form-control" placeholder="Nombre completo" value="{{ $user->name }}"></input>
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico*</label>
                    <input type="email" name="email" class="form-control" placeholder="ejemplo@correo.com" value="{{ $user->email }}"></input>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" placeholder="Teléfono de la empresa" value="{{ $user->telefono }}"></input>
                </div>

                <div class="form-group">
                    <label for="web">Sitio web</label>
                    <input type="text" name="web" class="form-control" placeholder="Sitio web de la empresa" value="{{ $user->web }}"></input>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña*</label>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña"></input>
                </div>

                <div class="form-group">
                    <label for="password">Confirmar contraseña*</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña"></input>
                </div>
                
                <div class="form-group">
                    <label for="empresa">Empresa*</label>
                    <input type="text" name="empresa" class="form-control" placeholder="Nombre de la empresa" value="{{ $user->empresa }}"></input>
                </div>

                <div class="form-group">
                    <label for="sector">Sector*</label>
                    {!! Form::select('sector', [
                        'Pública' => 'Pública',
                        'Privada' => 'Privada',
                        'ONG' => 'ONG',
                    ], $user->sector, ['class' => 'form-control', 'placeholder' => '-- Sector de la empresa --']); !!}
                </div>

                <div class="form-group">
                    <label for="ciudad">Ciudad*</label>
                    {!! Form::select('ciudad', [
                        'Ahuachapán' => [
                            'Ahuachapán, Ahuachapán' => 'Ahuachapán',
                            'Ahuachapán, Apaneca' => 'Apaneca',
                            'Ahuachapán, Atiquizaya' => 'Atiquizaya',
                            'Ahuachapán, Concepción de Ataco' => 'Concepción de Ataco',
                            'Ahuachapán, El Refugio' => 'El Refugio',
                            'Ahuachapán, Guaymango' => 'Guaymango',
                            'Ahuachapán, Jujutla' => 'Jujutla',
                            'Ahuachapán, San Francisco Menéndez' => 'San Francisco Menéndez',
                            'Ahuachapán, San Lorenzo' => 'San Lorenzo',
                            'Ahuachapán, San Pedro Puxtla' => 'San Pedro Puxtla',
                            'Ahuachapán, Tacuba' => 'Tacuba',
                            'Ahuachapán, Turín' => 'Turín'
                        ],
                        'Cabañas' => [
                            'Cabañas, Sensuntepeque' => 'Sensuntepeque',
                            'Cabañas, Cinquera' => 'Cinquera',
                            'Cabañas, Dolores' => 'Dolores',
                            'Cabañas, Guacotetic' => 'Guacotetic',
                            'Cabañas, Ilobasco' => 'Ilobasco',
                            'Cabañas, Jutiapa' => 'Jutiapa',
                            'Cabañas, San Isidro' => 'San Isidro',
                            'Cabañas, Tejutepeque' => 'Tejutepeque',
                            'Cabañas, Victoria' => 'Victoria'
                        ],
                        'Chalatenango' => [
                            'Chalatenango, Chalatenango' => 'Chalatenango',
                            'Chalatenango, Agua Caliente' => 'Agua Caliente',
                            'Chalatenango, Arcatao' => 'Arcatao',
                            'Chalatenango, Azacualpa' => 'Azacualpa',
                            'Chalatenango, Cancasque' => 'Cancasque',
                            'Chalatenango, Citalá' => 'Citalá',
                            'Chalatenango, Comalapa' => 'Comalapa',
                            'Chalatenango, Concepción Quezaltepeque' => 'Concepción Quezaltepeque',
                            'Chalatenango, Dulce Nombre de María' => 'Dulce Nombre de María',
                            'Chalatenango, El Carrizal' => 'El Carrizal',
                            'Chalatenango, El Paraíso' => 'El Paraíso',
                            'Chalatenango, La Laguna' => 'La Laguna',
                            'Chalatenango, La Palma' => 'La Palma',
                            'Chalatenango, La Reina' => 'La Reina',
                            'Chalatenango, Las Flores' => 'Las Flores',
                            'Chalatenango, Las Vueltas' => 'Las Vueltas',
                            'Chalatenango, Nombre de Jesús' => 'Nombre de Jesús',
                            'Chalatenango, Nueva Concepción' => 'Nueva Concepción',
                            'Chalatenango, Nueva Trinidad' => 'Nueva Trinidad',
                            'Chalatenango, Ojos de Agua' => 'Ojos de Agua',
                            'Chalatenango, Potonico' => 'Potonico',
                            'Chalatenango, San Antonio de la Cruz' => 'San Antonio de la Cruz',
                            'Chalatenango, San Antonio Los Ranchos' => 'San Antonio Los Ranchos',
                            'Chalatenango, San Fernando' => 'San Fernando',
                            'Chalatenango, San Francisco Lempa' => 'San Francisco Lempa',
                            'Chalatenango, San Francisco Morazán' => 'San Francisco Morazán',
                            'Chalatenango, San Ignacio' => 'San Ignacio',
                            'Chalatenango, San Isidro Labrador' => 'San Isidro Labrador',
                            'Chalatenango, San Luis del Carmen' => 'San Luis del Carmen',
                            'Chalatenango, San Miguel de Mercedes' => 'San Miguel de Mercedes',
                            'Chalatenango, San Rafael' => 'San Rafael',
                            'Chalatenango, Santa Rita' => 'Santa Rita',
                            'Chalatenango, Tejutla' => 'Tejutla'
                        ],
                        'Cuscatlán' => [
                            'Cuscatlán, Cojutepeque' => 'Cojutepeque',
                            'Cuscatlán, Candelaria' => 'Candelaria',
                            'Cuscatlán, El Carmen' => 'El Carmen',
                            'Cuscatlán, El Rosario' => 'El Rosario',
                            'Cuscatlán, Monte San Juan' => 'Monte San Juan',
                            'Cuscatlán, Oratorio de Concepción' => 'Oratorio de Concepción',
                            'Cuscatlán, San Bartolomé Perulapía' => 'San Bartolomé Perulapía',
                            'Cuscatlán, San Cristóbal' => 'San Cristóbal',
                            'Cuscatlán, San José Guayabal' => 'San José Guayabal',
                            'Cuscatlán, San Pedro Perulapán' => 'San Pedro Perulapán',
                            'Cuscatlán, San Rafael Cedros' => 'San Rafael Cedros',
                            'Cuscatlán, San Ramón' => 'San Ramón',
                            'Cuscatlán, Santa Cruz Analquito' => 'Santa Cruz Analquito',
                            'Cuscatlán, Santa Cruz Michapa' => 'Santa Cruz Michapa',
                            'Cuscatlán, Suchitoto' => 'Suchitoto',
                            'Cuscatlán, Tenancingo' => 'Tenancingo'
                        ],
                        'La Libertad' => [
                            'La Libertad, Santa Tecla' => 'Santa Tecla',
                            'La Libertad, Antiguo Cuscatlán' => 'Antiguo Cuscatlán',
                            'La Libertad, Chiltiupán' => 'Chiltiupán',
                            'La Libertad, Ciudad Arce' => 'Ciudad Arce',
                            'La Libertad, Colón' => 'Colón',
                            'La Libertad, Comasagua' => 'Comasagua',
                            'La Libertad, Huizúcar' => 'Huizúcar',
                            'La Libertad, Jayaque' => 'Jayaque',
                            'La Libertad, Jicalapa' => 'Jicalapa',
                            'La Libertad, La Libertad' => 'La Libertad',
                            'La Libertad, Nuevo Cuscatlán' => 'Nuevo Cuscatlán',
                            'La Libertad, Quezaltepeque' => 'Quezaltepeque',
                            'La Libertad, San Juan Opico' => 'San Juan Opico',
                            'La Libertad, Sacacoyo' => 'Sacacoyo',
                            'La Libertad, San José Villanueva' => 'San José Villanueva',
                            'La Libertad, San Matías' => 'San Matías',
                            'La Libertad, San Pablo Tacachico' => 'San Pablo Tacachico',
                            'La Libertad, Talnique' => 'Talnique',
                            'La Libertad, Tamanique' => 'Tamanique',
                            'La Libertad, Teotepeque' => 'Teotepeque',
                            'La Libertad, Tepecoyo' => 'Tepecoyo',
                            'La Libertad, Zaragoza' => 'Zaragoza'
                        ],
                        'La Paz' => [
                            'La Paz, Zacatecoluca' => 'Zacatecoluca',
                            'La Paz, Cuyultitán' => 'Cuyultitán',
                            'La Paz, El Rosario' => 'El Rosario',
                            'La Paz, Jerusalén' => 'Jerusalén',
                            'La Paz, Mercedes La Ceiba' => 'Mercedes La Ceiba',
                            'La Paz, Olocuilta' => 'Olocuilta',
                            'La Paz, Paraíso de Osorio' => 'Paraíso de Osorio',
                            'La Paz, San Antonio Masahuat' => 'San Antonio Masahuat',
                            'La Paz, San Emigdio' => 'San Emigdio',
                            'La Paz, San Francisco Chinameca' => 'San Francisco Chinameca',
                            'La Paz, San Pedro Masahuat' => 'San Pedro Masahuat',
                            'La Paz, San Juan Nonualco' => 'San Juan Nonualco',
                            'La Paz, San Juan Talpa' => 'San Juan Talpa',
                            'La Paz, San Juan Tepezontes' => 'San Juan Tepezontes',
                            'La Paz, San Luis La Herradura' => 'San Luis La Herradura',
                            'La Paz, San Luis Talpa' => 'San Luis Talpa',
                            'La Paz, San Miguel Tepezontes' => 'San Miguel Tepezontes',
                            'La Paz, San Pedro Nonualco' => 'San Pedro Nonualco',
                            'La Paz, San Rafael Obrajuelo' => 'San Rafael Obrajuelo',
                            'La Paz, Santa María Ostuma' => 'Santa María Ostuma',
                            'La Paz, Santiago Nonualco' => 'Santiago Nonualco',
                            'La Paz, Tapalhuaca' => 'Tapalhuaca'
                        ],
                        'La Unión' => [
                            'La Unión, La Unión' => 'La Unión',
                            'La Unión, Anamorós' => 'Anamorós',
                            'La Unión, Bolívar' => 'Bolívar',
                            'La Unión, Concepción de Oriente' => 'Concepción de Oriente',
                            'La Unión, Conchagua' => 'Conchagua',
                            'La Unión, El Carmen' => 'El Carmen',
                            'La Unión, El Sauce' => 'El Sauce',
                            'La Unión, Intipucá' => 'Intipucá',
                            'La Unión, Lislique' => 'Lislique',
                            'La Unión, Meanguera del Golfo' => 'Meanguera del Golfo',
                            'La Unión, Nueva Esparta' => 'Nueva Esparta',
                            'La Unión, Pasaquina' => 'Pasaquina',
                            'La Unión, Polorós' => 'Polorós',
                            'La Unión, San Alejo' => 'San Alejo',
                            'La Unión, San José' => 'San José',
                            'La Unión, Santa Rosa de Lima' => 'Santa Rosa de Lima',
                            'La Unión, Yayantique' => 'Yayantique',
                            'La Unión, Yucuaiquín' => 'Yucuaiquín'
                        ],
                        'Morazán' => [
                            'Morazán, San Francisco Gotera' => 'San Francisco Gotera',
                            'Morazán, Arambala' => 'Arambala',
                            'Morazán, Cacaopera' => 'Cacaopera',
                            'Morazán, Chilanga' => 'Chilanga',
                            'Morazán, Corinto' => 'Corinto',
                            'Morazán, Delicias de Concepción' => 'Delicias de Concepción',
                            'Morazán, El Divisadero' => 'El Divisadero',
                            'Morazán, El Rosario' => 'El Rosario',
                            'Morazán, Gualococti' => 'Gualococti',
                            'Morazán, Guatajiagua' => 'Guatajiagua',
                            'Morazán, Joateca' => 'Joateca',
                            'Morazán, Jocoaitique' => 'Jocoaitique',
                            'Morazán, Jocoro' => 'Jocoro',
                            'Morazán, Lolotiquillo' => 'Lolotiquillo',
                            'Morazán, Meanguera' => 'Meanguera',
                            'Morazán, Osicala' => 'Osicala',
                            'Morazán, Perquín' => 'Perquín',
                            'Morazán, San Carlos' => 'San Carlos',
                            'Morazán, San Fernando' => 'San Fernando',
                            'Morazán, San Isidro' => 'San Isidro',
                            'Morazán, San Simón' => 'San Simón',
                            'Morazán, Sensembra' => 'Sensembra',
                            'Morazán, Sociedad' => 'Sociedad',
                            'Morazán, Torola' => 'Torola',
                            'Morazán, Yamabal' => 'Yamabal',
                            'Morazán, Yoloaiquín' => 'Yoloaiquín'
                        ],
                        'San Miguel' => [
                            'San Miguel, San Miguel' => 'San Miguel',
                            'San Miguel, Carolina' => 'Carolina',
                            'San Miguel, Chapeltique' => 'Chapeltique',
                            'San Miguel, Chinameca' => 'Chinameca',
                            'San Miguel, Chirilagua' => 'Chirilagua',
                            'San Miguel, Ciudad Barrios' => 'Ciudad Barrios',
                            'San Miguel, Comacarán' => 'Comacarán',
                            'San Miguel, El Tránsito' => 'El Tránsito',
                            'San Miguel, Lolotique' => 'Lolotique',
                            'San Miguel, Moncagua' => 'Moncagua',
                            'San Miguel, Nueva Guadalupe' => 'Nueva Guadalupe',
                            'San Miguel, Nuevo Edén de San Juan' => 'Nuevo Edén de San Juan',
                            'San Miguel, Quelepa' => 'Quelepa',
                            'San Miguel, San Antonio' => 'San Antonio',
                            'San Miguel, San Gerardo' => 'San Gerardo',
                            'San Miguel, San Jorge' => 'San Jorge',
                            'San Miguel, San Luis de la Reina' => 'San Luis de la Reina',
                            'San Miguel, San Rafael Oriente' => 'San Rafael Oriente',
                            'San Miguel, Sesori' => 'Sesori',
                            'San Miguel, Uluazapa' => 'Uluazapa'
                        ],
                        'San Salvador' => [
                            'San Salvador, San Salvador' => 'San Salvador',
                            'San Salvador, Aguilares' => 'Aguilares',
                            'San Salvador, Apopa' => 'Apopa',
                            'San Salvador, Ayutuxtepeque' => 'Ayutuxtepeque',
                            'San Salvador, Cuscatancingo' => 'Cuscatancingo',
                            'San Salvador, Delgado' => 'Delgado',
                            'San Salvador, El Paisnal' => 'El Paisnal',
                            'San Salvador, Guazapa' => 'Guazapa',
                            'San Salvador, Ilopango' => 'Ilopango',
                            'San Salvador, Mejicanos' => 'Mejicanos',
                            'San Salvador, Nejapa' => 'Nejapa',
                            'San Salvador, Panchimalco' => 'Panchimalco',
                            'San Salvador, Rosario de Mora' => 'Rosario de Mora',
                            'San Salvador, San Marcos' => 'San Marcos',
                            'San Salvador, San Martín' => 'San Martín',
                            'San Salvador, Santiago Texacuangos' => 'Santiago Texacuangos',
                            'San Salvador, Santo Tomás' => 'Santo Tomás',
                            'San Salvador, Soyapango' => 'Soyapango',
                            'San Salvador, Tonacatepeque' => 'Tonacatepeque'
                        ],
                        'San Vicente' => [
                            'San Vicente, San Vicente' => 'San Vicente',
                            'San Vicente, Apastepeque' => 'Apastepeque',
                            'San Vicente, Guadalupe' => 'Guadalupe',
                            'San Vicente, San Cayetano Istepeque' => 'San Cayetano Istepeque',
                            'San Vicente, San Esteban Catarina' => 'San Esteban Catarina',
                            'San Vicente, San Ildefonso' => 'San Ildefonso',
                            'San Vicente, San Lorenzo' => 'San Lorenzo',
                            'San Vicente, San Sebastián' => 'San Sebastián',
                            'San Vicente, Santa Clara' => 'Santa Clara',
                            'San Vicente, Santo Domingo' => 'Santo Domingo',
                            'San Vicente, Tecoluca' => 'Tecoluca',
                            'San Vicente, Tepetitán' => 'Tepetitán',
                            'San Vicente, Verapaz' => 'Verapaz'
                        ],
                        'Santa Ana' => [
                            'Santa Ana, Santa Ana' => 'Santa Ana',
                            'Santa Ana, Candelaria de la Frontera' => 'Candelaria de la Frontera',
                            'Santa Ana, Chalchuapa' => 'Chalchuapa',
                            'Santa Ana, Coatepeque' => 'Coatepeque',
                            'Santa Ana, El Congo' => 'El Congo',
                            'Santa Ana, El Porvenir' => 'El Porvenir',
                            'Santa Ana, Masahuat' => 'Masahuat',
                            'Santa Ana, Metapán' => 'Metapán',
                            'Santa Ana, San Antonio Pajonal' => 'San Antonio Pajonal',
                            'Santa Ana, San Sebastián Salitrillo' => 'San Sebastián Salitrillo',
                            'Santa Ana, Santa Rosa Guachipilín' => 'Santa Rosa Guachipilín',
                            'Santa Ana, Santiago de la Frontera' => 'Santiago de la Frontera',
                            'Santa Ana, Texistepeque' => 'Texistepeque'
                        ],
                        'Sonsonate' => [
                            'Sonsonate, Sonsonate' => 'Sonsonate',
                            'Sonsonate, Acajutla' => 'Acajutla',
                            'Sonsonate, Armenia' => 'Armenia',
                            'Sonsonate, Caluco' => 'Caluco',
                            'Sonsonate, Cuisnahuat' => 'Cuisnahuat',
                            'Sonsonate, Izalco' => 'Izalco',
                            'Sonsonate, Juayúa' => 'Juayúa',
                            'Sonsonate, Nahuizalco' => 'Nahuizalco',
                            'Sonsonate, Nahulingo' => 'Nahulingo',
                            'Sonsonate, Salcoatitán' => 'Salcoatitán',
                            'Sonsonate, San Antonio del Monte' => 'San Antonio del Monte',
                            'Sonsonate, San Julián' => 'San Julián',
                            'Sonsonate, Santa Catarina Masahuat' => 'Santa Catarina Masahuat',
                            'Sonsonate, Santa Isabel Ishuatán' => 'Santa Isabel Ishuatán',
                            'Sonsonate, Santo Domingo de Guzmán' => 'Santo Domingo de Guzmán',
                            'Sonsonate, Sonzacate' => 'Sonzacate'
                        ],
                        'Usulután' => [
                            'Usulután, Usulután' => 'Usulután',
                            'Usulután, Alegría' => 'Alegría',
                            'Usulután, Berlín' => 'Berlín',
                            'Usulután, California' => 'California',
                            'Usulután, Concepción Batres' => 'Concepción Batres',
                            'Usulután, El Triunfo' => 'El Triunfo',
                            'Usulután, Ereguayquín' => 'Ereguayquín',
                            'Usulután, Estanzuelas' => 'Estanzuelas',
                            'Usulután, Jiquilisco' => 'Jiquilisco',
                            'Usulután, Jucuapa' => 'Jucuapa',
                            'Usulután, Jucuarán' => 'Jucuarán',
                            'Usulután, Mercedes Umaña' => 'Mercedes Umaña',
                            'Usulután, Nueva Granada' => 'Nueva Granada',
                            'Usulután, Ozatlán' => 'Ozatlán',
                            'Usulután, Puerto El Triunfo' => 'Puerto El Triunfo',
                            'Usulután, San Agustín' => 'San Agustín',
                            'Usulután, San Buenaventura' => 'San Buenaventura',
                            'Usulután, San Dionisio' => 'San Dionisio',
                            'Usulután, San Francisco Javier' => 'San Francisco Javier',
                            'Usulután, Santa Elena' => 'Santa Elena',
                            'Usulután, Santa María' => 'Santa María',
                            'Usulután, Santiago de María' => 'Santiago de María',
                            'Usulután, Tecapán' => 'Tecapán'
                        ]
                    ], $user->ciudad, ['class' => 'form-control', 'placeholder' => '-- Ubicación de la empresa --']); !!}
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" class="form-control" placeholder="Dirección de la empresa" value="{{ $user->direccion }}"></input>
                </div>

	  			<div class="form-group text-right">
	  				<button class="btn btn-primary" type="submit">Guardar</button>
	  				<button class="btn btn-danger" type="reset">Cancelar</button>
	  			</div>
	  		{!! Form::close() !!}
		</div>
	</div>
@endsection