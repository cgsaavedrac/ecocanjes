@extends('layouts.app')

@section('title', 'Mensajes')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Listado de Mensajes</h2>
            <div class="team">
                <div class="row">
                    <div class="table-responsive">
                        <form class="form" name="f1" method="POST" action="{{ url('/userapp/mensajes/') }}">
                            {{ csrf_field() }}
                            <button class="btn btn-primary">Marcar como leido</button><br>
                            <table class="table table-condensed">
                                <thead>
                                    <tr style="color: #00529e;font-weight: 500;">
                                        <th class="col-xs-1 text-left"><a href="javascript:seleccionar_todo()">Marcar Todos</a>|<br>
<a href="javascript:deseleccionar_todo()">Marcar ninguno</a> </th>
                                        <th class="col-xs-1 text-left">ID</th>
                                        <th class="col-xs-6 text-center">Mensaje</th>
                                        <th class="col-xs-2 text-center">Fecha de envío</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                    <tr>
                                        <td class="col-xs-1 text-left"><input type="checkbox" name="read[]" id="read" value="{{$message->id }}"></td>
                                        <td class="col-xs-1 text-left">{{ $message->id}}</td>
                                        <td class="col-xs-6 text-justify">{{ $message->message }}</td>
                                        <td class="col-xs-2 text-center">{{ $message->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>    
                    </div>
                    {{ $messages->links() }}
                </div>
            </div>

        </div>

    </div>

</div>
<script>
    function seleccionar_todo(){ 
        for (i=0;i<document.f1.elements.length;i++) 
            if(document.f1.elements[i].type == "checkbox")    
            document.f1.elements[i].checked=1 
    } 

    function deseleccionar_todo(){ 
        for (i=0;i<document.f1.elements.length;i++) 
            if(document.f1.elements[i].type == "checkbox")    
            document.f1.elements[i].checked=0 
    }
</script>
@include('includes.footeruserapp')
@endsection