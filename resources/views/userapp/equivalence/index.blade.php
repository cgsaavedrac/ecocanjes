@extends('layouts.app')

@section('title', 'Tablas de Conversión')
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

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Tablas de Conversión</h2>

            <div class="team">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <th class="col-md-2 text-center">Nombre Equivalencia</th>
                                    <th class="col-md-2 text-center">Unidad</th>
                                    <th class="col-md-2 text-center">Equivalencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equivalences as $equivalence)
                                <tr>
                                    <td>{{ $equivalence->name_equivalence}}</td>
                                    <td>{{ $equivalence->equivalence_amount }}{{ substr($equivalence->name_equivalence, '0', '3') }}</td>
                                    <td>{{ $equivalence->equivalence_factor}}{{ substr($equivalence->name_equivalence, '4', '3') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $equivalences->links() }}
                </div>
            </div>

        </div>

    </div>

</div>    
@include('includes.footeruserapp')
@endsection