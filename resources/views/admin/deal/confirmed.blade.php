@extends('layouts.app')

@section('title', 'Manejo de Negocio')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        
        <div class="row">
            <div class="section">
                <h2 class="text-center title" style="color: #00529e">Confirmación de Cierre de Negocio</h2>
                <h4 class="text-center title" style="color: #00529e">Etapa a la que pasará: {{ $status }}</h4>
                <h6 class="text-center title" style="color: red">Esta acción no la podra deshacer.</h6>
                <div class="container" align="center">
                    <form action="{{ url('/admin/deal/confirmed') }}" method="post">
                    {{ csrf_field() }}
                        <input type="hidden" value="{{ $id }}" name="id">
                        <input type="hidden" value="{{ $status }}" name="status">
                        <button type="submit" class="btn btn-primary btn-round">
                            <i class="material-icons">thumb_up</i> Confirmar
                        </button>
                    </form>
                    <a href="{{ url('/admin/deal/') }}" class="btn btn-primary btn-round">
                        <i class="material-icons">thumb_down</i> Cancelar
                    </a>
                </div>
            </div>
        </div>
        

       
</div>
@include('includes.footer')
@endsection

