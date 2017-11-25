@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-info" style="overflow: hidden;">
                <div class="col-sm-2">
                    <i class="fa fa-graduation-cap fa-5x"></i>
                </div>
                <div class="col-sm-10">
                    <h3 style="margin-top: 8px;"><strong>Estudiantes</strong></h3>
                    <p>
                        Encuentra proyectos y pasantías ideales para tu carrera y lugar de residencia.
                    </p>
                </div>
            </div>
            <div class="alert alert-warning" style="overflow: hidden;">
                <div class="col-sm-2">
                    <i class="fa fa-institution fa-5x"></i>
                </div>
                <div class="col-sm-10">
                    <h3 style="margin-top: 8px;"><strong>Empresas</strong></h3>
                    <p>
                        Oferta proyectos y pasantías de forma fácil y rápida. <strong><a href="{{ url('register') }}" style="color: #8a6d3b;">¡Registrate ya!</a></strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
