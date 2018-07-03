@extends('layouts.app')
@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg3.jpeg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <div class="header header-success text-center">
                            <h4>Resetear contraseña</h4>
                    </div>
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">mail</i>
                                </span>
                                <input id="email" type="email" class="form-control" placeholder="Su correo" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">
                                Enviar link para reseteo de contraseña
                            </button>
                            <div class="text-center btn btn-success">
                                <a href="{{ url('/') }}" style="color:#fff">
                                   Iniciar Sesión
                                </a>
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