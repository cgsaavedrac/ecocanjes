@extends('layouts.app')

@section('title', 'Mi Actividad')
@section('body-class', 'product-page')

@section('content')

    <div class="container" style="background:#fff">
        <div class="section">
            <h4 class="title text-center">Mi reciclaje</h4>       
                <div class="row">
                    <div class="col-xs-6 text-center">
                        <div><h4>{{ number_format($cantidad_reciclada_pet, 0, '', '.') }}<br>botellas</h4></div>   
                    </div>
                    <div class="col-xs-6 text-center">
                        <div><h4>{{ number_format($cantidad_reciclada_lat, 0, '', '.') }}<br>latas</h4></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 text-center"> 
                        <img src="{{ asset('img/botella.png') }}" alt="" class="img-responsive" width="25%" style="position: absolute;width: 100px;top: 0;left: 0;right: 0;margin: auto;">   
                    </div>
                    <div class="col-xs-6 text-center">
                        <img src="{{ asset('img/lata.png') }}" alt="" class="img-responsive" width="25%" style="position: absolute;width: 100px;top: 0;left: 0;right: 0;margin: auto;">    
                    </div>
                </div>
                <h4 class="title text-center" style="margin-top: 25%">Mi aporte al planeta</h4>   
                <div class="row">
                    <div class="col-xs-6 text-center">
                        <img src="{{ asset('img/IconosAporteAlPlaneta/agua_ahorrada.png') }}" alt="Agua Ahorrada"><br><h4>{{ $ahorro_agua_plastico + $ahorro_agua_aluminio }}Lt<br>Agua ahorrada</h4>
                        <img src="{{ asset('img/IconosAporteAlPlaneta/co2_ahorrado.png') }}" alt="CO2 Ahorrado"><br><h4>{{ $ahorro_bioxido_carbono_plastico + $ahorro_bioxido_carbono_aluminio }}Kg<br>CO2</h4>
                    </div>
                    <div class="col-xs-6 text-center">
                        <img src="{{ asset('img/IconosAporteAlPlaneta/energia_ahorrada.png') }}" alt="Energia Ahorrada"><br><h4>{{ $ahorro_energia_plastico + $ahorro_energia_aluminio }}kw<br>Energía ahorrada</h4>
                        <img src="{{ asset('img/IconosAporteAlPlaneta/basura_ahorrada.png') }}" alt="Basura Ahorrada"><br><h4>{{ $basura_ahorrada }}kg<br>Basura ahorrada</h4>
                    </div>
                </div>
        </div>
    </div>


@include('includes.footeruserapp')
@endsection

