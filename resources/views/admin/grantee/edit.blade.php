@extends('layouts.app')

@section('title', 'Actualización de Empresa')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar Usuario</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
            <form action="{{ url('/admin/grantee/'.$grantee->id.'/edit') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del Donatario</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $grantee->name) }}">
                        </div>
                    </div>
                </div> 
                <button class="btn btn-primary">Editar Donatario</button>
                <a href="{{ url('/admin/grantee') }}" class="btn btn-default">Cancelar</a>
                
            </form> 
            
        </div>

    </div>

</div>

@include('includes.footer')
@endsection


