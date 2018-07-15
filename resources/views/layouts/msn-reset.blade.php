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
                
                <a class="navbar-brand" href="#" style="color: #ffffff"><i class="material-icons">account_circle</i>{{ Auth::user()->name }}</a>
            </div>
                @endauth
        </div>
    </nav>

    <div class="wrapper">
    @yield('content')
    </div>
</body>
</html>
