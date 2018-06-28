@extends('layouts.app')

@section('title', 'Maquinas del Sistema')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Listado de Maquinas</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/machine/create') }}" class="btn btn-primary btn-round">Nueva Maquina</a>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <td class="text-center">ID</td>
                                    <td>Número de Maquina</td>
                                    <td>Región</td>
                                    <td>Comuna</td>
                                    <td>Dirección</td>
                                    <td>Días de atención</td>
                                    <td>Horas de atención</td>
                                    <td class="td-actions text-right">Opciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($machines as $machine)
                                <tr>
                                    <td class="text-center">{{ $machine->id}}</td>
                                    <td>{{ $machine->terminal_number}}</td>
                                    <td>{{ $machine->region->name }}</td>
                                    <td>{{ $machine->city->name}}</td>
                                    <td>{{ $machine->address}}</td>
                                    <td>{{ $machine->days_attention}}</td>
                                    <td>{{ $machine->hours_attention}}</td>
                                    <td class="td-actions text-right">
                                        <form action="{{ url('/admin/machine/'.$machine->id.'/delete') }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" rel="tooltip" title="Eliminar Maquina" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $machines->links() }}
                </div>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection