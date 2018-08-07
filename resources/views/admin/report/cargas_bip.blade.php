@extends('layouts.app')

@section('title', 'Cargas a tarjeta Bip realizadas')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Cargas a tarjeta Bip realizadas</h2>

            <div class="team">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <td class="text-center">ID</td>
                                    <td>Usuario Beneficiado</td>
                                    <td>Tarjeta Bip</td>
                                    <td>Eco Puntos</td>
                                    <td>Pesos Chilenos</td>
                                    <td>Fecha Solicitud</td>
                                    <td>Fecha Carga (Procesado)</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cargas_bip as $cargas)
                                <tr>
                                    <td class="text-center">{{ $cargas->id}}</td>
                                    <td>{{ $cargas->user->name}}</td>
                                    <td>{{ $cargas->number_bip }}</td>
                                    <td>{{ $cargas->quantity_eco}}</td>
                                    <td>{{ $cargas->clp}}</td>
                                    <td>{{ $cargas->created_at}}</td>
                                    <td>{{ $cargas->updated_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $cargas_bip->links() }}
                </div>
                <a href="{{ url('admin/report/excel_cargas_bip') }}" class="btn btn-success btn-sm">Exportar a Excel</a>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection