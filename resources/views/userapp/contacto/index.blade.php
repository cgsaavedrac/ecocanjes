@extends('layouts.app')

@section('title', 'Registro de Maquinas')
@section('body-class', 'product-page')

@section('content')
<style>
    .map-responsive{
    left:0;
    width:100%;
    position: absolute;
    z-index: -1;
    background: #fff;
    
  }
</style>
<div class="map-responsive">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Contacto</h2>
            <h6 class="title text-center">Nos agrada que te comuniques con nosotros, de esta manera podemos mejorar continuamente</h6>       
            <form action="{{ url('/userapp/contacto/') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">Nombre Completo: {{ $user->name }}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">Motivos
                            <input type="text" name="motivo" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">Comentarios
                            <textarea name="comentarios" id="comentarios" class="form-control" placeholder="Escriba aquí, lo que nos quiere decir" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">Whatsapp
                            <input type="number" maxlength="9" name="wsp" class="form-control">
                        </div>
                    </div>
                </div>
                               
                <button class="btn btn-primary">Actualizar Perfil</button>
                <a href="{{ url('/home') }}" class="btn btn-default">Cancelar</a>
                
            </form>
        </div>

    </div>

</div>
@include('includes.footeruserapp')
@endsection

