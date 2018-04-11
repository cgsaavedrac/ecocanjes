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
                <li>
                    <a href="#canjear" aria-controls="canjear" role="tab" data-toggle="tab">
                        <i class="material-icons">compare_arrows</i>
                        Cargar BIP
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
                            <button class="btn btn-success btn-fab btn-round">{{ $user_saldo }}</button><br><h4>Eco</h4>  
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
                            <div id="mapholder"></div>
                            <div class="table-responsive">
                              <table class="table table-condensed">
                                  <thead>
                                      <tr style="color: #00529e;font-weight: 500;">
                                          <td class="text-center">ID</td>
                                          <td>Máquina</td>
                                          <td>Ubicación</td>
                                          <td>Comuna</td>
                                          <td>Distancia</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($ubicacion_maquinas as $ubicacion_maquina)
                                      <tr>
                                          <td class="text-center">{{ $ubicacion_maquina->id}}</td>
                                          <td>{{ $ubicacion_maquina->machine->terminal_number}}</td>
                                          <td>{{ $ubicacion_maquina->address }}</td>
                                          <td>{{ $ubicacion_maquina->city->name }}</td>
                                          <td id="distancia{{ $ubicacion_maquina->id }}"></td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                    {{ $ubicacion_maquinas->links() }}
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="canjear">
                  <div class="section">
                    <h2 class="title text-center">Cargar BIP</h2>
                    <h3 class="title text-center">Canjear Eco</h3>
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif        
                      <form action="{{ url('/home') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group label-floating">
                              <label class="control-label">Número tarjeta Bip</label>
                              <input type="text" class="form-control" name="number_bip" value="{{ old('number_bip') }}">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group label-floating">
                              <label class="control-label">Cantidad de Eco</label>
                              <input type="number" class="form-control" name="quantity_eco" value="{{ old('quantity_eco') }}">
                            </div>
                          </div>
                        </div>
                        <button class="btn btn-success">Canjear</button>
                      </form>
                  </div>
                </div>
            </div>
        </div>  
    </div>       
</div>
<script>

navigator.geolocation.getCurrentPosition(showPosition,showError);
function showPosition(position)
  {
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  latlon=new google.maps.LatLng(lat, lon)
  mapholder=document.getElementById('mapholder')
  mapholder.style.height='250px';
  var myOptions={
  center:latlon,zoom:10,
  mapTypeId:google.maps.MapTypeId.ROADMAP,
  mapTypeControl:false,
  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  };
  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,title:"Tú estas aquí!"});
  @foreach ($ubicacion_maquinas as $ubicacion_maquina)
    latlon{{$ubicacion_maquina->id}}=new google.maps.LatLng({{ $ubicacion_maquina->latitude }},{{ $ubicacion_maquina->longitude }})
    var marker{{ $ubicacion_maquina->id }}=new google.maps.Marker({position:latlon{{ $ubicacion_maquina->id }},map:map,title:"Reciclar aquí!",icon:"{{ asset('img/Icono_mapa.png') }}"});
  @endforeach 

  rad = function(x) {return x*Math.PI/180;}
  var latitud = lat;
  var longitud = lon;
  var R = 6378.137; //Radio de la tierra en km
  @foreach ($ubicacion_maquinas as $ubicacion_maquina)
    var lat{{ $ubicacion_maquina->id }} = {{ $ubicacion_maquina->latitude }};
    var lon{{ $ubicacion_maquina->id }} = {{ $ubicacion_maquina->longitude }};
    var dLat{{ $ubicacion_maquina->id }} = rad( lat{{ $ubicacion_maquina->id }} - latitud );
    var dLong{{ $ubicacion_maquina->id }} = rad( lon{{ $ubicacion_maquina->id }} - longitud );
    var a{{ $ubicacion_maquina->id }} = Math.sin(dLat{{ $ubicacion_maquina->id }}/2) * Math.sin(dLat{{ $ubicacion_maquina->id }}/2) + Math.cos(rad(latitud)) * Math.cos(rad(lat{{ $ubicacion_maquina->id }})) * Math.sin(dLong{{ $ubicacion_maquina->id }}/2) * Math.sin(dLong{{ $ubicacion_maquina->id }}/2);
    var c{{ $ubicacion_maquina->id }} = 2 * Math.atan2(Math.sqrt(a{{ $ubicacion_maquina->id }}), Math.sqrt(1-a{{ $ubicacion_maquina->id }}));
    var d{{ $ubicacion_maquina->id }} = R * c{{ $ubicacion_maquina->id }};
    document.getElementById("distancia{{ $ubicacion_maquina->id }}").innerHTML=d{{ $ubicacion_maquina->id }}.toFixed(3) + " Kilometros de distancia";
  @endforeach  
  }
function showError(error)
  {
  switch(error.code) 
    {
    case error.PERMISSION_DENIED:
      x.innerHTML="Denegada la peticion de Geolocalización en el navegador."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="La información de la localización no esta disponible."
      break;
    case error.TIMEOUT:
      x.innerHTML="El tiempo de petición ha expirado."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="Ha ocurrido un error desconocido."
      break;
    }
  }
</script>
@include('includes.footer')
@endsection
