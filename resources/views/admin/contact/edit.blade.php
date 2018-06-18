@extends('layouts.app')

@section('title', 'Actualización de Contacto')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar Contacto</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif   
            <form action="{{ url('/admin/contact/'.$contact->id.'/edit') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre Contacto</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $contact->name) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Selecciones Empresa</label>
                            <select name="company_id" class="form-control">
                                <option value="0"></option>
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}" @if($company->id == 
                                    old('company_id', $contact->company_id)) selected @endif>
                                    {{ $company->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Teléfono Fijo</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone', $contact->phone) }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Teléfono Movil</label>
                            <input type="text" class="form-control" name="phone_mobile" value="{{ old('phone', $contact->phone_mobile) }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Correo Contacto</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $contact->email) }}">
                        </div>
                    </div>
                </div>  
                <button class="btn btn-primary">Editar Contacto</button>
                <a href="{{ url('/admin/contact') }}" class="btn btn-default">Cancelar</a>
                
            </form>
        </div>

    </div>

</div>

@include('includes.footer')
@endsection


