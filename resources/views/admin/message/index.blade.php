@extends('layouts.app')

@section('title', 'Mensajes')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Listado de Ventas</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/message/create') }}" class="btn btn-primary btn-round">Nuevo Mensaje</a>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <th class="text-center">ID</th>
                                    <th class="col-md-2 text-center">Código mensaje</th>
                                    <th class="col-md-2 text-center">Destinatario</th>
                                    <th class="col-md-2 text-center">Mensaje</th>
                                    <th class="col-md-2 text-center">Fecha de envío</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                <tr>
                                    <td class="text-center">{{ $message->id}}</td>
                                    <td>{{ $message->message_code}}</td>
                                    <td>{{ $message->user->name}}</td>
                                    <td>{{ $message->message }}</td>
                                    <td>{{ $message->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $messages->links() }}
                </div>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection