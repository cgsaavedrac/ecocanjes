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
        <h2 class="text-center title" style="color: #00529e">¿Confirma que desea Canjear sus Ecopesos?</h2>
        <h3 class="text-center title" style="color: #00529e">{{ $number_bip ? 'Tarjeta Bip '.$number_bip : 'Donar a '.$grantee_name  }}</h3>
        <h3 class="text-center title" style="color: #00529e">{{ $quantity_eco ? 'Cantidad a Canjear '.$quantity_eco : 'Cantidad a donar '.$quantity_eco_donar }}</h3>
        <h6 class="text-center title" style="color: red">Esta acción no la podra deshacer.</h6>
        <div class="container" align="center">
         
            <a href="{{ $number_bip ? url('/userapp/canjes/result_transaction/'.$number_bip.'/'.$quantity_eco.'/0/0') : url('/userapp/canjes/result_transaction/0/0/'.$grantee_id.'/'.$quantity_eco_donar.'') }}" class="btn btn-primary btn-round">
                <i class="material-icons">thumb_up</i> Confirmar
            </a>
         
          <a href="{{ url('/userapp/canjes/') }}" class="btn btn-primary btn-round">
            <i class="material-icons">thumb_down</i> Cancelar
          </a>
        </div>
      </div>
    </div> 
  </div>
</div>
@include('includes.footeruserapp')
@endsection

