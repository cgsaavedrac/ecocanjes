@extends('layouts.app')

@section('title', 'Registro de Maquinas')
@section('body-class', 'product-page')

@section('content')
<style>
    .map-responsive{
    left:0;
    width:100%;
    position: absolute;
    z-index: -1;
    background: #fff;
    
  }
</style>
<div class="map-responsive">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Perfil de Usuario</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif        
            <form action="{{ url('/admin/machine') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">Nombre Completo
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">Correo
                            <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">Fecha nacimiento
                            <input class="datepicker form-control" type="date" placeholder="Fecha posible de cierre" name="closing_date" />
                        </div>
                 
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">Sexo
                            <select name="sexo" id="sexo" class="form-control">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            
                            {!! Form::select('region2', $regions_combo, null,['placeholder'=>'Seleccione Región','class'=>'form-control','id'=>'region2']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            {!! Form::select('city2',['placeholder'=>'Seleccione Comuna'],null,['class'=>'form-control','id'=>'city2']) !!}
                        </div>
                    </div>
                </div>                 
                <button class="btn btn-primary">Guardar Maquina</button>
                <a href="{{ url('/admin/machine') }}" class="btn btn-default">Cancelar</a>
                
            </form>
        </div>

    </div>

</div>
@include('includes.footeruserapp')
@endsection

