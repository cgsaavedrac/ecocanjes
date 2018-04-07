@extends('layouts.app')

@section('title', 'Ecocanjes')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    <div class="container">
        <div class="container" style="padding-top: 15px;">
            <ul class="nav nav-pills nav-pills-success" role="tablist">
                <li class="active">
                    <a href="#actividad" aria-controls="actividad" role="tab" data-toggle="tab">
                        <i class="material-icons">dashboard</i>
                        Actividad
                    </a>
                </li>
                <li>
                    <a href="#balance" aria-controls="balance" role="tab" data-toggle="tab">
                        <i class="material-icons">account_balance_wallet</i>
                        Balance
                    </a>
                </li>
                <li>
                    <a href="#ubicacion2" aria-controls="ubicacion2" role="tab" data-toggle="tab">
                        <i class="material-icons">place</i>
                        Donde reciclar
                    </a>
                </li>
            </ul>
        </div>
        <div class="container" style="padding-top: 15px;">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="actividad">
                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <div><h3>Mi saldo es</h3></div>
                            <button class="btn btn-success btn-fab btn-round">{{ $user_saldo }}</button><br><h4>Ecopesos</h4>  
                        </div>
                        <div class="col-sm-6 text-center">
                            <div><h3>Mi reciclaje ha sido de</h3></div>
                            <button class="btn btn-success btn-fab btn-round">{{ $cantidad_reciclada }}</button><br><h4>unidades recicladas</h4>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6"> 
                        </div>
                        <div class="col-sm-6 text-center">
                            <div><h3>Mi aporte al planeta</h3></div>
                            <i class="material-icons" style="font-size:48px;color: #4caf50">opacity</i><br><h4>{{ $ahorro_agua_plastico }}Lt<br>Agua ahorrada</h4>
                            <i class="material-icons" style="font-size:48px;color: #4caf50">smoking_rooms</i><br><h4>{{ $ahorro_bioxido_carbono_plastico }}Kg<br>CO2</h4>
                            <i class="material-icons" style="font-size:48px;color: #4caf50">lightbulb_outline</i><br><h4>{{ $ahorro_energia_plastico }}kw<br>Energía ahorrada</h4>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="balance">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <td class="text-center">ID</td>
                                    <td>Movimiento</td>
                                    <td>Monto</td>
                                    <td>Fecha</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_movimientos as $user_movimiento)
                                <tr>
                                    <td class="text-center">{{ $user_movimiento->id}}</td>
                                    <td>{{ $user_movimiento->movement_type->name}}</td>
                                    <td>{{ $user_movimiento->mount}}</td>
                                    <td>{{ $user_movimiento->transaction_date}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $user_movimientos->links() }}
                </div>
                <div role="tabpanel" class="tab-pane" id="ubicacion2">
                    <div class="container">
                        <div class="container">
                            <div class="embed-responsive embed-responsive-16by9">
                              <iframe class="embed-responsive-item" src="https://www.vivipra.cl/localization.php" allowfullscreen allow="geolocation"></iframe>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>       
</div>
@include('includes.footer')
@endsection
