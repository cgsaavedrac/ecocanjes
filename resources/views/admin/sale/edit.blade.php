@extends('layouts.app')

@section('title', 'Actualización de Empresa')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar Venta</h2>
            <form class="form" method="POST" action="{{ url('/admin/sale/'.$sale->id.'/edit') }}">
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
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Fecha Venta</label>
                            <input type="date" class="form-control" name="sale_date" value="{{ old('sale_date', $sale_date_format) }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Comprador</label>
                            <input type="text" class="form-control" name="buyer" value="{{ old('buyer', $sale->buyer) }}" required>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Tipo de Material</label>
                            <select name="material_type" id="material_type" class="form-control" required>
                                <option value="{{ $sale->material_type }}" selected="">{{ $sale->material_type }}</option>
                                <option value="Pet">Pet</option>
                                <option value="Latas">Latas</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Cantidad(Kg)</label>
                            <input type="text" class="form-control" pattern="[0-9]{1,8}" title="Letras y números. Tamaño mínimo: 1. Tamaño máximo: 8" name="quantity" value="{{ old('quantity', $sale->quantity) }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Valor unitario</label>
                            <input type="text" class="form-control" pattern="[0-9]{1,8}" title="Letras y números. Tamaño mínimo: 1. Tamaño máximo: 8" name="unit_value" value="{{ old('unit_value', $sale->unit_value) }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Valor Total recibido</label>
                            <input type="text" class="form-control" pattern="[0-9]{1,8}" title="Letras y números. Tamaño mínimo: 1. Tamaño máximo: 8" name="total_value_received" value="{{ old('total_value_received', $sale->total_value_received) }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Número factura</label>
                            <input type="text" class="form-control" pattern="[0-9]{1,8}" title="Letras y números. Tamaño mínimo: 1. Tamaño máximo: 8" name="bill_number" value="{{ old('bill_number', $sale->bill_number) }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Comentarios</label>
                            <textarea class="form-control" name="comment" id="comment" cols="30" rows="10" required>{{ old('comment', $sale->comment) }}</textarea>
                        </div>
                    </div>
                </div>                  
                <button class="btn btn-primary">Editar Venta</button>
                <a href="{{ url('/admin/sale') }}" class="btn btn-default">Cancelar</a>
            </form>







            
            
        </div>

    </div>

</div>

@include('includes.footer')
@endsection


