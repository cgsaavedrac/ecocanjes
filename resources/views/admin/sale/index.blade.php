@extends('layouts.app')

@section('title', 'Ventas')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Listado de Ventas</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/sale/create') }}" class="btn btn-primary btn-round">Nueva Venta</a>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <th class="text-center">ID</th>
                                    <th class="col-md-2 text-center">Fecha Venta</th>
                                    <th class="col-md-2 text-center">Comprador</th>
                                    <th class="col-md-2 text-center">Tipo de Material</th>
                                    <th class="col-md-2 text-center">Cantidad(Kg)</th>
                                    <th class="col-md-2 text-center">Valor unitario</th>
                                    <th class="col-md-2 text-center">Valor total recibido</th>
                                    <th class="col-md-2 text-center">Factura</th>
                                    <th class="col-md-2 text-center">Comentario</th>
                                    <th class="col-md-2 text-center">Ingresado por</th>
                                    <th class="td-actions text-right">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                <tr>
                                    <td class="text-center">{{ $sale->id}}</td>
                                    <td>{{ $sale->sale_date}}</td>
                                    <td>{{ $sale->buyer}}</td>
                                    <td>{{ $sale->material_type }}</td>
                                    <td>{{ number_format($sale->quantity, 0, ',', '.')}}</td>
                                    <td>{{ number_format($sale->unit_value, 0, ',', '.')}}</td>
                                    <td>{{ number_format($sale->total_value_received, 0, ',', '.')}}</td>
                                    <td>{{ $sale->bill_number}}</td>
                                    <td>{{ $sale->comment}}</td>
                                    <td>{{ $sale->user->name}}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ url('/admin/sale/'.$sale->id.'/edit') }}" rel="tooltip" title="Editar Venta" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/sale/'.$sale->id.'/delete') }}" onclick="return confirm('¿Esta seguro de eliminar este registro?')" rel="tooltip" title="Eliminar Venta" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $sales->links() }}
                </div>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection