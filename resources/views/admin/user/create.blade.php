@extends('layouts.app')

@section('title', 'Registro de Empresas')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Registro de Usuarios</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif        
            <form class="form" method="POST" action="{{ url('/admin/user') }}">
                        {{ csrf_field() }}
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

                            <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <input id="name" type="text" class="form-control" placeholder="Su nombre" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

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

                            <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password" type="password" class="form-control" placeholder="Su contraseña" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password-confirm" type="password" class="form-control" placeholder="Repita su contraseña" name="password_confirmation" required>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">
                                    Registrar
                                </button>
                            </div>
            </form>
        </div>

    </div>

</div>
@include('includes.footer')
@endsection

