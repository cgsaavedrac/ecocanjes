<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>@yield('title', config('app.name'))</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet"/>

</head>

<body class="@yield('body-class')">
    <nav class="navbar-default" role="navigation" style="margin-bottom: 0px;background-color: #4caf50;color: #ffffff !important">
        <div class="container-fluid">
            <div class="navbar-header">
                @auth
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="color: #ffffff"><i class="material-icons">account_circle</i>{{ Auth::user()->name }}</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @if (auth()->user()->admin == '1')    
                    <li><a href="{{ url('/home') }}" style="color:#ffffff">Inicio</a></li>
                    <li><a href="{{ url('/admin/user/') }}" style="color:#ffffff">Usuarios</a></li>
                    <li><a href="{{ url('/admin/sale/') }}" style="color:#ffffff">Ventas</a></li>         
                    <li><a href="{{ url('/admin/machine/') }}" style="color:#ffffff">Maquinas</a></li>
                    <li><a href="{{ url('/admin/banner/') }}" style="color:#ffffff">Banner</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: #4caf50;color: #ffffff">Parametros <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('admin/grantee') }}">Donatario</a></li>
                            <li><a href="{{ url('admin/equivalence') }}">Equivalencias</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: #4caf50;color: #ffffff">Eco Gestión <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('admin/exchange') }}">Canjes Bip</a></li>
                            <li><a href="{{ url('admin/exchange/donaciones') }}">Donaciones</a></li>
                            <li><a href="{{ url('admin/charge') }}">Agregar Eco Puntos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: #4caf50;color: #ffffff">Reportes <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('admin/report/cargas_bip') }}">Cargas a BIP</a></li>
                            <li><a href="{{ url('admin/report/donaciones') }}">Donaciones Procesadas</a></li>
                            <li><a href="{{ url('admin/report/saldoDisponible') }}">Saldos disponibles (ECO)</a></li>
                            <li><a href="{{ url('admin/report/usuariosRegistrados') }}">Usuarios registrados</a></li>
                            <li><a href="{{ url('admin/report/canjesRegistrados') }}">Canjes</a></li>
                        </ul>
                    </li>
                    
                    @endif
                    @if (auth()->user()->admin == '0') 
                    <li><a href="{{ url('/userapp/perfil/create') }}" style="color:#ffffff">Perfil</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: #4caf50;color: #ffffff">Como funciona <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('userapp/periodos-facturacion') }}" style="background: #4caf50;color: #ffffff">Periodos de facturación</a></li>
                            <li><a href="{{ url('userapp/proceso-canje') }}" style="background: #4caf50;color: #ffffff">Proceso de canje</a></li>
                            <li><a href="{{ url('userapp/equivalence') }}" style="background: #4caf50;color: #ffffff">Tabla conversiones</a></li>
                            <li><a href="{{ url('userapp/maquinas') }}" style="background: #4caf50;color: #ffffff">Máquinas</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/userapp/contacto') }}" style="color:#ffffff">Contacto</a></li>
                    <li><a href="{{ url('/userapp/historial') }}" style="color:#ffffff">Historial</a></li>
                    @endif
                    <li>
                       
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:#ffffff">
                            Cerrar sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
    @yield('content')
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material.min.js') }}"></script>
    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="{{ asset('js/dropdown.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material-kit.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('js/responsiveslides.min.js') }}"></script>

    <script>

        $(function () {

          $("#slider").responsiveSlides({

            auto: true,

            nav: true,

            speed: 500,

            namespace: "callbacks",

            pager: true,

          });

        });

    </script>
    
</body>
</html>
