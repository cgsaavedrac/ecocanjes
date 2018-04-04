@extends('layouts.app')

@section('title', 'Ecocanjes')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    <div class="container">
        <h2>Resumen de Negocios y Actividades</h2>
        <h2>Ganancias proyectadas para el mes en curso: </h2>
        <div class="row">
            <div class="col-sm-6">
                <div class="container">
                    <h3>Negocios</h3>
                    <h4>Abiertos: <span style="color:#9c27b0"></span></h4>
                    <h4>Primer Contacto: <span style="color:#03a9f4"></span></h4>
                    <h4>Calificado: <span style="color:#4caf50"></span></h4>
                    <h4>Cotización: <span style="color:#fbc02d"></span></h4>
                    <h4>Presentación: <span style="color:#f44336"></span></h4>
                    <h4>Envío de Contrato: <span style="color:#8CC657"></span></h4>
                    <h4>Cierre ganado: <span style="color:blue"></span></h4>
                    <h4>Cierre perdido: <span style="color:#000000"></span></h4>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="table-responsive">
                    <h3>Actividades Pendientes</h3>
                    <table class="table table-condensed">
                        <thead>
                            <tr style="color: #00529e;font-weight: 500;">
                                <td class="text-center">ID</td>
                                <td>Tipo Actividad</td>
                                <td>Titulo</td>
                                <td>Descripción</td>
                                <td>Fecha Actividad</td>
                                <td>Estado</td>
                                <td style="padding: 0px">Opciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td class="text-center"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="td-actions text-right">
                                    <a href="" rel="tooltip" title="Marcar como realizada" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>       
</div>
@include('includes.footer')
@endsection
