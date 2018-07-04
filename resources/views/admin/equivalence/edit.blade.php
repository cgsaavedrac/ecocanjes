@extends('layouts.app')

@section('title', 'Actualización de Empresa')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar Equivalencia</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
            <form action="{{ url('/admin/equivalence/'.$equivalence->id.'/edit') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre Equivalencia</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $equivalence->name_equivalence) }}" readonly="">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Unidad</label>
                            <input type="text" class="form-control" name="equivalence_amount" value="{{ old('equivalence_amount', $equivalence->equivalence_amount) }}" readonly="">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Equivalencia</label>
                            <input type="number" class="form-control" name="equivalence_factor" value="{{ old('equivalence_factor', $equivalence->equivalence_factor) }}">
                        </div>
                    </div>
                </div>
                

                 
                <button class="btn btn-primary">Editar Equivalencia</button>
                <a href="{{ url('/admin/equivalence') }}" class="btn btn-default">Cancelar</a> 
            </form>
            
        </div>

    </div>

</div>

@include('includes.footer')
@endsection


