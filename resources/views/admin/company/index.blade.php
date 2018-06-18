@extends('layouts.app')

@section('title', 'Panel de Control')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Listado de Empresas</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/company/create') }}" class="btn btn-primary btn-round">Nueva Empresa</a>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <th class="text-center">ID</th>
                                    <th class="col-md-2 text-center">Nombre empresa</th>
                                    <th class="col-md-2 text-center">Dirección</th>
                                    <th class="td-actions text-right">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                <tr>
                                    <td class="text-center">{{ $company->id}}</td>
                                    <td>{{ $company->name}}</td>
                                    <td>{{ $company->address}}</td>
                                    <td class="td-actions text-right">
                                        <form action="{{ url('/admin/company/'.$company->id.'/delete') }}" method="post">
                                            {{ csrf_field() }}
                                            <a href="{{ url('/admin/company/'.$company->id.'/edit') }}" rel="tooltip" title="Editar Empresa" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="submit" rel="tooltip" title="Eliminar Empresa" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $companies->links() }}
                </div>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection