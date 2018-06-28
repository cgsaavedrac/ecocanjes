@extends('layouts.app')

@section('title', 'Niveles del Sistema')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Niveles en el Sistema</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/ranking/create') }}" class="btn btn-primary btn-round">Nuevo Nivel</a>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <th class="text-center">ID</th>
                                    <th class="col-md-2 text-center">Nombre</th>
                                    <th class="col-md-2 text-center">Desde (Uni. Recicladas)</th>
                                    <th class="col-md-2 text-center">Hasta (Uni. Recicladas)</th>
                                    <th class="td-actions text-right">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rankings as $ranking)
                                <tr>
                                    <td class="text-center">{{ $ranking->id}}</td>
                                    <td>{{ $ranking->name}}</td>
                                    <td>{{ $ranking->from}}</td>
                                    <td>{{ $ranking->to}}</td>
                                    <td class="td-actions text-right">
                                        <form action="{{ url('/admin/ranking/'.$ranking->id.'/delete') }}" method="post">
                                            {{ csrf_field() }}
                                            <a href="{{ url('/admin/ranking/'.$ranking->id.'/edit') }}" rel="tooltip" title="Editar Nivel" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="submit" rel="tooltip" title="Eliminar Nivel" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection