<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'TPIproject')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('font/css/font-awesome.min.css')}}"/>

<!--
    Fonts por defecto de Laravel

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    El código no se crea ni se destruye, solo se comenta. :v
-->

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>

<!--
    Styles por defecto de Laravel

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
-->

    <style>
        
        body {
            padding-top: 70px;
        }

        .fa-btn {
            margin-right: 6px;
        }

        .mi_margen {
            margin-bottom: 10px;
        }

        .alinear {
            text-align: right;
        }

        .bs-callout {
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #eee;
            border-left-color: #1b809e;
            border-left-width: 5px;
            border-radius: 3px;
        }

        .footer-letra {
            margin-bottom: 20px;
            color: #bbb;
        }

        .i-pd {
            margin-right: 10px;
        }

    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    TPIproject
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- <li><a href="{{ url('/home') }}">Inicio</a></li> -->
                    <li><a href="{{ url('buscar/proyecto') }}">Inicio</a></li>
                    <li><a href="{{ url('ofertas/proyecto') }}">Proyectos</a></li>
                    <li><a href="{{ url('ofertas/pasantia') }}">Pasantías</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Iniciar sesión</a></li>
                        <li><a href="{{ url('/register') }}">Registrar</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar sesión</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
        <footer>
            <hr>
            <div class="col-xs-6">
                <p class="footer-letra">
                    <i class="fa fa-copyright fa-flip-horizontal"></i> 2017 NetWar
                </p>
            </div>
            <div class="col-xs-6">
                <p class="footer-letra" style="text-align: right;">
                    <i class="fa fa-btn fa-github"></i><a href="https://github.com/WilliamCoto/tpiproject">Repositorio del proyecto</a>
                </p>
            </div>
        </footer>
    </div>

    <!-- JavaScripts -->
    <script src="{{asset('js/jquery.js')}}"></script>
    @stack('scripts')
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

<!--
    JavaScript por defecto de Laravel

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
-->

</body>
</html>
