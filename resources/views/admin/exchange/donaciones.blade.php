@extends('layouts.app')

@section('title', 'Donaciones')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Donaciones</h2>

            <div class="team">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <td class="text-center">ID</td>
                                    <td>Nombre de Usuario</td>
                                    <td>Correo</td>
                                    <td>Fundación</td>
                                    <td>Eco Puntos donados</td>
                                    <td>Pesos Chilenos</td>
                                    <td>Fecha</td>
                                    <td>Comentario</td>
                                    <td>Estado Solicitud</td>
                                    <td class="td-actions text-right">Opciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exchanges as $exchange)
                                <tr>
                                    <td class="text-center">{{ $exchange->id}}</td>
                                    <td>{{ $exchange->user->name}}</td>
                                    <td>{{ $exchange->user->email }}</td>
                                    <td>{{ $exchange->grantee->name}}</td>
                                    <td>{{ $exchange->quantity_eco}}</td>
                                    <td>{{ $exchange->clp}}</td>
                                    <td>{{ $exchange->transaction_date}}</td>
                                    <form action="{{ url('/admin/exchange/donaciones') }}" method="post">
                                        {{ csrf_field() }}
                                        <td>{{ $exchange->updated_at }} {{ $exchange->comment }}<input name="id" type="hidden" value="{{ $exchange->id }}"><textarea name="comment" class="form-control" placeholder="Escriba aquí un comentario"></textarea><button type="submit" class="btn btn-primary btn-just-icon"><i class="material-icons">save</i></button></td>
                                    </form>
                                    <td>{{ $exchange->status}}</td>
                                    <td class="td-actions text-right">
                                        @if($exchange->status == 'Abierto')
                                            <a href="{{ url('/admin/exchange/'.$exchange->id.'/change_grantee') }}" onclick="return confirm('¿Esta seguro de procesar este registro?')" rel="tooltip" title="Marcar como procesado" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-check"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $exchanges->links() }}
                </div>
                <a href="{{ url('admin/exchange/excel_donaciones') }}" class="btn btn-success btn-sm">Exportar a Excel</a>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection