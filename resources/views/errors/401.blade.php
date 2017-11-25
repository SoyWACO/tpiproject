@extends('layouts.app')

@section('title', 'Acceso restringido')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-warning">
                <div class="panel-heading text-center">Acceso restringido</div>
                <div class="panel-body text-center">
                    <i class="fa fa-btn fa-lock fa-5x" style="color: #8a6d3b;"></i>
                    <hr>
                    <p>Usted no tiene acceso a esta zona</p>
                    <p><a href="{{ url('/') }}">¿Desea volver al inicio?</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection