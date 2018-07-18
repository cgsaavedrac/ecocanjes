@extends('layouts.app')

@section('title', 'Saldo disponible contable por usuario')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Saldo disponible contable por usuario</h2>

            <div class="team">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <td>Usuario</td>
                                    <td>Entradas</td>
                                    <td>Salidas</td>
                                    <td>Saldo Contable (ECO)</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($saldos_contable as $total)
                                <tr>
                                    <td>{{ $total->name}}</td>
                                    <td>{{ $total->m1 }}</td>
                                    <td>{{ $total->m2 }}</td>
                                    <td>{{ $total->m1 - $total->m2 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{ url('admin/report/excel_saldoDisponible') }}" class="btn btn-success btn-sm">Exportar a Excel</a>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection