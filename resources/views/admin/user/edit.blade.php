@extends('layouts.app')

@section('title', 'Actualización de Empresa')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar Usuario</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
            <form class="form" method="POST" action="{{ url('/admin/user/'.$user->id.'/edit') }}">
                {{ csrf_field() }}
                <div class="content">

                    <div class="input-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <input id="name" type="text" class="form-control" placeholder="Su nombre" name="name" value="{{ old('name', $user->name) }}" required autofocus>

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
                        <input id="email" type="email" class="form-control" placeholder="Su correo" name="email" value="{{ old('email', $user->email) }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">how_to_reg</i>
                        </span>
                            <select name="admin" class="form-control">
                                <option value="0"></option>
                                @if($user->admin == 0)
                                <option value="{{ $user->admin }}" @if($user->admin == 
                                    old('admin', $user->admin)) selected @endif>
                                    @if($user->admin == 0)Usuario APP @endif
                                </option>
                                <option value="1">
                                    Administrador
                                </option>
                                @else
                                <option value="{{ $user->admin }}" @if($user->admin == 
                                    old('admin', $user->admin)) selected @endif>
                                    @if($user->admin == 1)Administrador @endif
                                </option>
                                <option value="0">
                                    Usuario APP
                                </option>
                                @endif
                                
                            </select>
                        
                    </div>

                    <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                        </span>
                        <input id="password" type="password" class="form-control" placeholder="Su contraseña" name="password">

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
                        <input id="password-confirm" type="password" class="form-control" placeholder="Repita su contraseña" name="password_confirmation">
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">
                            Editar Usuario
                        </button>
                        <a href="{{ url('/admin/user') }}" class="btn btn-default">Cancelar</a>
                    </div>
            </form>  
            
        </div>

    </div>

</div>

@include('includes.footer')
@endsection


