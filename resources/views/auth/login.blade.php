@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
                <i class="fa fa-btn fa-sign-in fa-4x"></i>
                <h3 style="margin-top: 10px;">Iniciar sesión</h3>
                <hr>
            </div>
                    
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                    <div class="col-md-7">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="ejemplo@correo.com">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Contraseña</label>

                    <div class="col-md-7">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-7 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Acceder</button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Recordar
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-link" href="{{ url('/password/reset') }}" style="padding-left: 0">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>


            </form>
                
        </div>
    </div>

@endsection
