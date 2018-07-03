@extends('layouts.app')

@section('title', 'Mi Actividad')
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
            <h2 class="title text-center">Mi reciclaje</h2>       
                <div class="row">
                    <div class="col-xs-6 text-center">
                        <div><h3>{{ number_format($cantidad_reciclada_pet, 0, '', '.') }}<br>botellas</h3></div>   
                    </div>
                    <div class="col-xs-6 text-center">
                        <div><h3>{{ number_format($cantidad_reciclada_lat, 0, '', '.') }}<br>latas</h3></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 text-center"> 
                        <img src="{{ asset('img/pet.png') }}" alt="" class="img-responsive" width="25%" style="position: absolute;width: 100px;top: 0;left: 0;right: 0;margin: auto;">   
                    </div>
                    <div class="col-xs-6 text-center">
                        <img src="{{ asset('img/pet.png') }}" alt="" class="img-responsive" width="25%" style="position: absolute;width: 100px;top: 0;left: 0;right: 0;margin: auto;">    
                    </div>
                </div>
                <h4 class="title text-center" style="margin-top: 25%">Mi aporte al planeta</h4>   
                <div class="row">
                    <div class="col-xs-6 text-center">
                        <i class="material-icons" style="font-size:48px;color: #4caf50">opacity</i><br><h4>{{ $ahorro_agua_plastico + $ahorro_agua_aluminio }}Lt<br>Agua ahorrada</h4>
                        <i class="material-icons" style="font-size:48px;color: #4caf50">smoking_rooms</i><br><h4>{{ $ahorro_bioxido_carbono_plastico + $ahorro_bioxido_carbono_aluminio }}Kg<br>CO2</h4>
                    </div>
                    <div class="col-xs-6 text-center">
                        <i class="material-icons" style="font-size:48px;color: #4caf50">lightbulb_outline</i><br><h4>{{ $ahorro_energia_plastico + $ahorro_energia_aluminio }}kw<br>Energía ahorrada</h4>
                    </div>
                </div>
        </div>
    </div>

</div>
@include('includes.footeruserapp')
@endsection

