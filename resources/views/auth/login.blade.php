@extends('layouts.app')
@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg3.jpeg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="header header-success text-center">
                            <h4>Iniciar sesión en {{ config('app.name') }}</h4>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="content">

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email..." required autofocus>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password" type="password" class="form-control" name="password" required />
                            </div>

                            <!-- If you want to add a checkbox to this form, uncomment this code-->

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Recordar
                                </label>
                            </div>
                            <div class="text-left">
                                <a href="{{ route('password.request') }}" style="color:#000">
                                   ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-success btn-round"><i class="material-icons">fingerprint</i> Ingresar</button>
                        </div>
                        <div class="text-center">
                            ¿Aún no tienes cuenta?
                        </div>
                        <div class="footer text-center">
                            <a class="btn btn-success btn-round" href="{{ route('register') }}">
                               <i class="material-icons">person</i> Registrate
                            </a>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>

@include('includes.footer')

</div>
@endsection
