@extends('layouts.app')

@section('title', 'Maquinas')
@section('body-class', 'product-page')

@section('content')
<style>
    .map-responsive{
    left:0;
    width:100%;
    position: absolute;
    z-index: -1;
    background: #fff;
    height: -webkit-fill-available;
    
  }
</style>
<div class="map-responsive">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Maquinas</h2>
            <h6 class="title text-center">proximamente...</h6>
                
           
        </div>

    </div>

</div>
@include('includes.footeruserapp')
@endsection

