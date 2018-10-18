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
                            <h5>Versión Beta</h5>
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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Eléctronico" required autofocus>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Clave" required />
                            </div>

                            <!-- If you want to add a checkbox to this form, uncomment this code-->
                            <div class="footer text-right">
                                <button type="submit" class="btn btn-success btn-round"><i class="material-icons">fingerprint</i> Ingresar</button>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('password.request') }}" style="color:#000">
                                   Recordar clave
                                </a>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('register') }}" style="color:#000;padding-bottom: 15px">
                               Registrar usuario nuevo</a>
                            </div> 
                        </div>
                           
                    </form>
                </div>
            </div>
        </div>
    </div>

@include('includes.footer')

</div>
@endsection
