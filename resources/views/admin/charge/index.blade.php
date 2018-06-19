@extends('layouts.app')

@section('title', 'Cargas Eco Puntos')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Agregar Eco Puntos</h2>

            <div class="team">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <td class="text-center">ID</td>
                                    <td>Nombre de Usuario</td>
                                    <td>Correo</td>
                                    <td class="td-actions text-right">Opciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{ $user->id}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ url('/admin/charge/'.$user->id.'/edit') }}" rel="tooltip" title="Agregar Eco Puntos" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-plus"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection