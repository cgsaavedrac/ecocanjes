@extends('layouts.app')

@section('title', 'Registro de Niveles')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Registro de Niveles</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif        
            <form action="{{ url('/admin/ranking') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del Nivel</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Unidades desde</label>
                            <input type="number" class="form-control" name="from" value="{{ old('from') }}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Unidades hasta</label>
                            <input type="number" class="form-control" name="to" value="{{ old('to') }}" required>
                        </div>
                    </div>
                </div>                 
                <button class="btn btn-primary">Guardar Nivel</button>
                <a href="{{ url('/admin/ranking') }}" class="btn btn-default">Cancelar</a>   
            </form>
        </div>

    </div>

</div>
@include('includes.footer')
@endsection

