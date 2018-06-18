@extends('layouts.app')

@section('title', 'Panel de Control')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Listado de Contactos</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/contact/create') }}" class="btn btn-primary btn-round">Nuevo Contacto</a>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <td class="text-center">ID</td>
                                    <td>Nombre Contacto</td>
                                    <td>Empresa Contacto</td>
                                    <td>Teléfono Fijo</td>
                                    <td>Teléfono Movil</td>
                                    <td>Correo Contacto</td>
                                    <td class="td-actions text-right">Opciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                <tr>
                                    <td class="text-center">{{ $contact->id}}</td>
                                    <td>{{ $contact->name}}</td>
                                    <td>{{ $contact->company->name}}</td>
                                    <td>{{ $contact->phone}}</td>
                                    <td>{{ $contact->phone_mobile}}</td>
                                    <td>{{ $contact->email}}</td>
                                    <td class="td-actions text-right">
                                        <form action="{{ url('/admin/contact/'.$contact->id.'/delete') }}" method="post">
                                            {{ csrf_field() }}
                                            <a href="{{ url('/admin/contact/'.$contact->id.'/edit') }}" rel="tooltip" title="Editar Contacto" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="submit" rel="tooltip" title="Eliminar Contacto" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $contacts->links() }}
                </div>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection