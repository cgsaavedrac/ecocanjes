@extends('layouts.app')

@section('title', 'Donaciones')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Donaciones procesadas</h2>

            <div class="team">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <td class="text-center">ID</td>
                                    <td>Usuario Donante</td>
                                    <td>Fundación</td>
                                    <td>Eco Puntos</td>
                                    <td>Pesos Chilenos</td>
                                    <td>Fecha Donación</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donaciones as $donacion)
                                <tr>
                                    <td class="text-center">{{ $donacion->id}}</td>
                                    <td>{{ $donacion->user->name}}</td>
                                    <td>{{ $donacion->grantee->name }}</td>
                                    <td>{{ $donacion->quantity_eco}}</td>
                                    <td>{{ $donacion->clp}}</td>
                                    <td>{{ $donacion->updated_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $donaciones->links() }}
                </div>
                <a href="{{ url('admin/report/excel_donaciones') }}" class="btn btn-success btn-sm">Exportar a Excel</a>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection