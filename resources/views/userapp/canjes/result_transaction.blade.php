@extends('layouts.app')

@section('title', 'Beneficios')
@section('body-class', 'product-page')

@section('content')
<style>
    .map-responsive{
    left:0;
    width:100%;
    position: absolute;
    z-index: -1;
    background: #fff;
    height: 100%
    
  }
</style>
<div class="map-responsive">
  <div class="container">
    <div class="row">
      <div class="section">
        <h2 class="text-center title" style="color: #00529e">Gracias por ayudar, tu solicitud se procesara en 48 horas.</h2>
      </div>
    </div> 
  </div>
</div>
@include('includes.footeruserapp')
@endsection

