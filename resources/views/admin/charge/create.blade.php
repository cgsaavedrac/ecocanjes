@extends('layouts.app')

@section('title', 'Registro de Maquinas')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Registro de Maquinas</h2>
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
                        <div class="form-group label-floating">
                            <label class="control-label">Número Terminal</label>
                            <input type="text" class="form-control" name="terminal_number" value="{{ old('terminal_number') }}" required>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <h3 style="color: #00529e">Datos de Ubicación</h3>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            
                            {!! Form::select('region', $regions_combo, null,['placeholder'=>'Seleccione Región','class'=>'form-control','id'=>'region']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            {!! Form::select('city',['placeholder'=>'Seleccione Comuna'],null,['class'=>'form-control','id'=>'city']) !!}
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Dirección</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Latitud</label>
                            <input type="text" class="form-control" name="latitude" value="{{ old('latitude') }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Longitud</label>
                            <input type="text" class="form-control" name="longitude" value="{{ old('longitude') }}" required>
                        </div>
                    </div>
                </div>                 
                <button class="btn btn-primary">Guardar Maquina</button>
                <a href="{{ url('/admin/machine') }}" class="btn btn-default">Cancelar</a>
                
            </form>
        </div>

    </div>

</div>
@include('includes.footer')
@endsection

