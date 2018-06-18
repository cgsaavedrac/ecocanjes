@extends('layouts.app')

@section('title', 'Panel de Control')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Listado de Negocios</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/deal/create') }}" class="btn btn-primary btn-round">Nuevo Negocio</a>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <td class="text-center">ID</td>
                                    <td>Ejecutivo</td>
                                    <td>Titulo</td>
                                    <td>Requerimiento</td>
                                    <td>Contacto</td>
                                    <td>Estado</td>
                                    <td>Monto proyectado</td>
                                    <td class="td-actions text-right">Opciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deals as $deal)
                                <tr>
                                    <td class="text-center">{{ $deal->id}}</td>
                                    <td>{{ $deal->user->name}}</td>
                                    <td>{{ $deal->title}}</td>
                                    <td>{{ $deal->request}}</td>
                                    <td>{{$deal->contact->name}}</td>
                                    <td>{{ $deal->status}}</td>
                                    <td>{{ $deal->amount}}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ url('/admin/deal/'.$deal->id.'/manager-deal') }}" rel="tooltip" title="Trabajar negocio" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $deals->links() }}
                </div>
            </div>

        </div>

    </div>

</div>
@include('includes.footer')
@endsection