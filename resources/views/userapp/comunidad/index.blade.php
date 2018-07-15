@extends('layouts.app')

@section('title', 'Comunidad')
@section('body-class', 'product-page')

@section('content')
<style>
    .map-responsive{
    left:0;
    width:100%;
    position: absolute;
    z-index: -1;
    background: #fff;
    height: 100%;
    
  }
</style>
<div class="map-responsive">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Mi nivel es {{ $nivel }}</h2> 
            <h3 class="text-center">{{ number_format($kilos_reciclados, 0, '', '.') }} kilos reciclados, buen trabajo, sigue así.</h3>      
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="warning">
                            <td class="text-center">Usuario</td>
                            <td class="text-center">Kilos</td>
                            <td class="text-center">Nivel</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ranking_usuarios as $ranking)
                        <tr>
                            <td>{{ $ranking->name }}</td>
                            <td>{{ number_format($ranking->kilos_pet + $ranking->kilos_lat, 0, '', '.') }}</td>
                            <td>{{ $nivel}} </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>   
                
               
        </div>
    </div>

</div>
@include('includes.footeruserapp')
@endsection

