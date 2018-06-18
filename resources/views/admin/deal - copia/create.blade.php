@extends('layouts.app')

@section('title', 'Registro de Negocios')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center" style="color: #00529e">Registro de Negocios</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif        
            <form action="{{ url('/admin/deal') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Titulo del Negocio</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <h3 style="color: #00529e">Datos del Contacto</h3>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            
                            {!! Form::select('company', $companies_combo, null,['placeholder'=>'Seleccione Empresa','class'=>'form-control','id'=>'company']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            {!! Form::select('contact',['placeholder'=>'Seleccione Contacto'],null,['class'=>'form-control','id'=>'contact']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3 style="color: #00529e">Datos del Negocio</h3>
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <textarea class="form-control" placeholder="Descripción completa del requerimiento del potencial cliente" name="request" rows="5">{{ old('request') }}</textarea>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Monto del Negocio</label>
                            <input type="number" class="form-control" name="amount" value="{{ old('amount') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating" data-date-format="yyyy-mm-dd">
                            <input class="datepicker form-control" type="text" placeholder="Fecha posible de cierre" name="closing_date" />
                        </div>
                    </div>
                </div> 
                <button class="btn btn-primary">Crear Negocio</button>
                <a href="{{ url('/admin/deal') }}" class="btn btn-default">Cancelar</a>
                
            </form>
        </div>

    </div>

</div>
@include('includes.footer')
@endsection

