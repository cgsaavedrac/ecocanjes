@extends('layouts.app')

@section('title', 'Actualización de Contacto')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar Máquina</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif   
            <form action="{{ url('/admin/machine/'.$machine->id.'/edit') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Número Terminal</label>
                            <input type="text" class="form-control" name="terminal_number" value="{{ old('terminal_number', $machine->terminal_number) }}" required>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <h3 style="color: #00529e">Datos de Ubicación</h3>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            
                            
                            {!! Form::select('region', $regions_combo,$machine->region->pluck('id'),['placeholder'=>$machine->region->name,'class'=>'form-control','id'=>'region']) !!}
                            
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            
                            {!! Form::select('city',[$machine->city->id=>$machine->city->name],null,['class'=>'form-control','id'=>'city']) !!}
                            
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Dirección</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address', $machine->address) }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Latitud</label>
                            <input type="text" class="form-control" name="latitude" value="{{ old('latitude', $machine->latitude) }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Longitud</label>
                            <input type="text" class="form-control" name="longitude" value="{{ old('longitude', $machine->longitude) }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Días de Atención</label>
                            <select name="days_attention" id="days_attention" class="form-control">
                                <option value="{{ old('days_attention', $machine->days_attention) }}" selected="">{{ $machine->days_attention }}</option>
                                <option value="Lunes a Viernes">Lunes a Viernes</option>
                                <option value="Lunes a Sabado">Lunes a Sabado</option>
                                <option value="Todos los días">Todos los días</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Horas de Atención</label>
                            <select name="hours_attention" id="hours_attention" class="form-control">
                                <option value="{{ old('hours_attention', $machine->hours_attention) }}" selected="">{{ $machine->hours_attention }}</option>
                                <option value="8:00 - 18:00">8:00 - 18:00</option>
                                <option value="9:00 - 19:00">9:00 - 19:00</option>
                                <option value="11:00 - 21:00">11:00 - 21:00</option>
                                <option value="24 horas">24 horas</option>
                            </select>
                        </div>
                    </div>
                </div>                 
                <button class="btn btn-primary">Actualizar Maquina</button>
                <a href="{{ url('/admin/machine') }}" class="btn btn-default">Cancelar</a>
                
            </form>
        </div>

    </div>

</div>

@include('includes.footer')
@endsection


