@extends('layouts.app')

@section('title', 'Donatarios del Sistema')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Listado de Donatarios</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/grantee/create') }}" class="btn btn-primary btn-round">Nuevo Donatario</a>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <th class="text-center">ID</th>
                                    <th class="col-md-2 text-center">Nombre</th>
                                    <th class="td-actions text-right">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grantees as $grantee)
                                <tr>
                                    <td class="text-center">{{ $grantee->id}}</td>
                                    <td>{{ $grantee->name}}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ url('/admin/grantee/'.$grantee->id.'/edit') }}" rel="tooltip" title="Editar Donatario" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/grantee/'.$grantee->id.'/delete') }}" onclick="return confirm('¿Esta seguro de eliminar este registro?')" rel="tooltip" title="Eliminar Donatario" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $grantees->links() }}
                </div>
            </div>

        </div>

    </div>

</div>
@include('includes.footer')
@endsection