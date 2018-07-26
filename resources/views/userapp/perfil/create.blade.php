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
            <h6 class="title text-center">Recuerde que para poder canjear debe tener su perfil actualizado</h6>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif        
            <form action="{{ url('/userapp/perfil/'.$user->id.'/msn') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">Nombre Completo: {{ $user->name }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">Correo: {{ $user->email }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">Fecha nacimiento
                            <input class="datepicker form-control" type="date" name="birth_date" value="{{ old('date', $user->birth_date) }}" />
                        </div>
                 
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">Sexo
                            
                            <select name="sexo" id="sexo" class="form-control">
                                <option value="{{ $user->sexo }}" @if($user->id == 
                                    old('sexo', $user->sexo)) selected @endif>
                                    @if ($user->sexo == 'M')Masculino @endif @if ($user->sexo == 'F')Femenino @endif @if($user->sexo == '') Seleccione @endif
                                </option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            {!! Form::select('region2', $regions_combo, null,['placeholder'=>$user->region ? $user->region->name : 'Seleccione','class'=>'form-control','id'=>'region2']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            {!! Form::select('city2',['placeholder'=>$user->city ? $user->city->name : 'Seleccione'],null,['class'=>'form-control','id'=>'city2']) !!}
                        </div>
                    </div>
                </div>                 
                <button class="btn btn-primary">Actualizar Perfil</button>
                <a href="{{ url('/home') }}" class="btn btn-default">Cancelar</a>
                
            </form>
        </div>

    </div>

</div>
@include('includes.footeruserapp')
@endsection

