@extends('layouts.app')

@section('title', 'Actualización de Empresa')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar Empresa</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif   
            <form action="{{ url('/admin/company/'.$company->id.'/edit') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre Empresa</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $company->name) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Dirección Empresa</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address', $company->address) }}">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Editar Empresa</button>
                <a href="{{ url('/admin/company') }}" class="btn btn-default">Cancelar</a>
                
            </form>
        </div>

    </div>

</div>

@include('includes.footer')
@endsection


