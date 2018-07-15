@extends('layouts.msn-reset')

@section('title', 'Reseteo de contraseña')
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
            <h2 class="title text-center">Reseteo de contraseña exitoso</h2>
            <h6 class="title text-center">Su contraseña ha sido cambiada exitosamente, ya puede ingresar nuevamente a la APP, FELIZ RECICLAJE.</h6>       
        </div>
    </div>
</div>
@endsection

