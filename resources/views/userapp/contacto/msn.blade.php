@extends('layouts.app')

@section('title', 'Registro de Maquinas')
@section('body-class', 'product-page')

@section('content')
<style>
    .map-responsive{
    left:0;
    height: 100%;
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
            <h6 class="title text-center">Gracias por comunicarte con nosotros, trataremos de responder en el menor tiempo y gracias por tu aporte al planeta.</h6>       
        </div>
    </div>
</div>
@include('includes.footeruserapp')
@endsection

