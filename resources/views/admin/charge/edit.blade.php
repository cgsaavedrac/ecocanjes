@extends('layouts.app')

@section('title', 'Agregar Eco Puntos')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Agregar Eco Puntos</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif   
            <form action="{{ url('/admin/charge/'.$user->id.'/edit') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" disabled="">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Correo</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" disabled="">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Saldo de Eco Puntos</label>
                            <input type="text" class="form-control" name="user_saldo" value="{{ old('user_saldo', $user_saldo) }}" disabled="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Número de Eco Puntos a Sumar</label>
                            <input type="number" class="form-control" name="quantity_eco">
                        </div>
                    </div>
                </div>
                

                
                <button class="btn btn-primary">Agregar</button>
                <a href="{{ url('/admin/charge') }}" class="btn btn-default">Cancelar</a>
                
            </form>
        </div>

    </div>

</div>

@include('includes.footer')
@endsection


