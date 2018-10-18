@extends('layouts.app')

@section('title', 'Mensajes')
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
            <h2 class="title text-center">Mensajería APP Ecocanjes</h2>
            <h6 class="title text-center">Su mensaje fue despachado con exito a los usuarios.</h6>       
        </div>
    </div>
</div>
@include('includes.footeruserapp')
@endsection

