@extends('layouts.app')

@section('title', 'Actualización de Nivel')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar Nivel</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
            <form action="{{ url('/admin/ranking/'.$ranking->id.'/edit') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de Nivel</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $ranking->name) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Unidades desde</label>
                            <input type="number" class="form-control" name="from" value="{{ old('from', $ranking->from) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Unidades hasta</label>
                            <input type="number" class="form-control" name="to" value="{{ old('to', $ranking->to) }}">
                        </div>
                    </div>
                </div>  
                <button class="btn btn-primary">Editar Nivel</button>
                <a href="{{ url('/admin/ranking') }}" class="btn btn-default">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@include('includes.footer')
@endsection


