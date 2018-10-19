@extends('layouts.app')

@section('title', 'Historial')
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
            <h2 class="title text-center">Historial de movimientos</h2>   
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr style="color: #00529e;font-weight: 500;">
                            <td class="col-md-2 text-center">Movimiento</td>
                            <td class="col-md-2 text-center">Monto</td>
                            <td class="col-md-2 text-center">Fecha</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_movimientos as $user_movimiento)
                        <tr>
                            <td class="col-md-2 text-center">{{ $user_movimiento->movement_type->name}}</td>
                            <td class="col-md-2 text-center">{{ $user_movimiento->mount}} ECO</td>
                            <td class="col-md-2 text-center">{{ $user_movimiento->transaction_date}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $user_movimientos->links() }}   
                
               
        </div>
    </div>

</div>
@include('includes.footeruserapp')
@endsection

