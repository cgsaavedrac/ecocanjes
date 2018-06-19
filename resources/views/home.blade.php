@extends('layouts.app')

@section('title', 'Ecocanjes')
@section('body-class', 'product-page')

@section('content')
<style>
#contenedor {
  width:100px;
  height:100px;
  padding-left: 50%;
}
  .loader {
  font-size: 20px;
  margin: 45% auto;
  width: 0.5em;
  height: 0.5em;
  border-radius: 50%;
  position: relative;
  text-indent: -9999em;
  -webkit-animation: load4 1.3s infinite linear;
  animation: load4 1.3s infinite linear;
}
@-webkit-keyframes load4 {
  0%,
  100% {
    box-shadow: 0em -3em 0em 0.2em #4caf50, 2em -2em 0 0em #4caf50, 3em 0em 0 -0.5em #4caf50, 2em 2em 0 -0.5em #4caf50, 0em 3em 0 -0.5em #4caf50, -2em 2em 0 -0.5em #4caf50, -3em 0em 0 -0.5em #4caf50, -2em -2em 0 0em #4caf50;
  }
  12.5% {
    box-shadow: 0em -3em 0em 0em #4caf50, 2em -2em 0 0.2em #4caf50, 3em 0em 0 0em #4caf50, 2em 2em 0 -0.5em #4caf50, 0em 3em 0 -0.5em #4caf50, -2em 2em 0 -0.5em #4caf50, -3em 0em 0 -0.5em #4caf50, -2em -2em 0 -0.5em #4caf50;
  }
  25% {
    box-shadow: 0em -3em 0em -0.5em #4caf50, 2em -2em 0 0em #4caf50, 3em 0em 0 0.2em #4caf50, 2em 2em 0 0em #4caf50, 0em 3em 0 -0.5em #4caf50, -2em 2em 0 -0.5em #4caf50, -3em 0em 0 -0.5em #4caf50, -2em -2em 0 -0.5em #4caf50;
  }
  37.5% {
    box-shadow: 0em -3em 0em -0.5em #4caf50, 2em -2em 0 -0.5em #4caf50, 3em 0em 0 0em #4caf50, 2em 2em 0 0.2em #4caf50, 0em 3em 0 0em #4caf50, -2em 2em 0 -0.5em #4caf50, -3em 0em 0 -0.5em #4caf50, -2em -2em 0 -0.5em #4caf50;
  }
  50% {
    box-shadow: 0em -3em 0em -0.5em #4caf50, 2em -2em 0 -0.5em #4caf50, 3em 0em 0 -0.5em #4caf50, 2em 2em 0 0em #4caf50, 0em 3em 0 0.2em #4caf50, -2em 2em 0 0em #4caf50, -3em 0em 0 -0.5em #4caf50, -2em -2em 0 -0.5em #4caf50;
  }
  62.5% {
    box-shadow: 0em -3em 0em -0.5em #4caf50, 2em -2em 0 -0.5em #4caf50, 3em 0em 0 -0.5em #4caf50, 2em 2em 0 -0.5em #4caf50, 0em 3em 0 0em #4caf50, -2em 2em 0 0.2em #4caf50, -3em 0em 0 0em #4caf50, -2em -2em 0 -0.5em #4caf50;
  }
  75% {
    box-shadow: 0em -3em 0em -0.5em #4caf50, 2em -2em 0 -0.5em #4caf50, 3em 0em 0 -0.5em #4caf50, 2em 2em 0 -0.5em #4caf50, 0em 3em 0 -0.5em #4caf50, -2em 2em 0 0em #4caf50, -3em 0em 0 0.2em #4caf50, -2em -2em 0 0em #4caf50;
  }
  87.5% {
    box-shadow: 0em -3em 0em 0em #4caf50, 2em -2em 0 -0.5em #4caf50, 3em 0em 0 -0.5em #4caf50, 2em 2em 0 -0.5em #4caf50, 0em 3em 0 -0.5em #4caf50, -2em 2em 0 0em #4caf50, -3em 0em 0 0em #4caf50, -2em -2em 0 0.2em #4caf50;
  }
}
@keyframes load4 {
  0%,
  100% {
    box-shadow: 0em -3em 0em 0.2em #4caf50, 2em -2em 0 0em #4caf50, 3em 0em 0 -0.5em #4caf50, 2em 2em 0 -0.5em #4caf50, 0em 3em 0 -0.5em #4caf50, -2em 2em 0 -0.5em #4caf50, -3em 0em 0 -0.5em #4caf50, -2em -2em 0 0em #4caf50;
  }
  12.5% {
    box-shadow: 0em -3em 0em 0em #4caf50, 2em -2em 0 0.2em #4caf50, 3em 0em 0 0em #4caf50, 2em 2em 0 -0.5em #4caf50, 0em 3em 0 -0.5em #4caf50, -2em 2em 0 -0.5em #4caf50, -3em 0em 0 -0.5em #4caf50, -2em -2em 0 -0.5em #4caf50;
  }
  25% {
    box-shadow: 0em -3em 0em -0.5em #4caf50, 2em -2em 0 0em #4caf50, 3em 0em 0 0.2em #4caf50, 2em 2em 0 0em #4caf50, 0em 3em 0 -0.5em #4caf50, -2em 2em 0 -0.5em #4caf50, -3em 0em 0 -0.5em #4caf50, -2em -2em 0 -0.5em #4caf50;
  }
  37.5% {
    box-shadow: 0em -3em 0em -0.5em #4caf50, 2em -2em 0 -0.5em #4caf50, 3em 0em 0 0em #4caf50, 2em 2em 0 0.2em #4caf50, 0em 3em 0 0em #4caf50, -2em 2em 0 -0.5em #4caf50, -3em 0em 0 -0.5em #4caf50, -2em -2em 0 -0.5em #4caf50;
  }
  50% {
    box-shadow: 0em -3em 0em -0.5em #4caf50, 2em -2em 0 -0.5em #4caf50, 3em 0em 0 -0.5em #4caf50, 2em 2em 0 0em #4caf50, 0em 3em 0 0.2em #4caf50, -2em 2em 0 0em #4caf50, -3em 0em 0 -0.5em #4caf50, -2em -2em 0 -0.5em #4caf50;
  }
  62.5% {
    box-shadow: 0em -3em 0em -0.5em #4caf50, 2em -2em 0 -0.5em #4caf50, 3em 0em 0 -0.5em #4caf50, 2em 2em 0 -0.5em #4caf50, 0em 3em 0 0em #4caf50, -2em 2em 0 0.2em #4caf50, -3em 0em 0 0em #4caf50, -2em -2em 0 -0.5em #4caf50;
  }
  75% {
    box-shadow: 0em -3em 0em -0.5em #4caf50, 2em -2em 0 -0.5em #4caf50, 3em 0em 0 -0.5em #4caf50, 2em 2em 0 -0.5em #4caf50, 0em 3em 0 -0.5em #4caf50, -2em 2em 0 0em #4caf50, -3em 0em 0 0.2em #4caf50, -2em -2em 0 0em #4caf50;
  }
  87.5% {
    box-shadow: 0em -3em 0em 0em #4caf50, 2em -2em 0 -0.5em #4caf50, 3em 0em 0 -0.5em #4caf50, 2em 2em 0 -0.5em #4caf50, 0em 3em 0 -0.5em #4caf50, -2em 2em 0 0em #4caf50, -3em 0em 0 0em #4caf50, -2em -2em 0 0.2em #4caf50;
  }
}
</style>
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>
@if (auth()->user()->admin == '0')   
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
                                    <td>Movimiento</td>
                                    <td>Monto</td>
                                    <td>Fecha</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_movimientos as $user_movimiento)
                                <tr>
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
                            <div id="mapholder">
                              <div id="contenedor" align="center">
                                <div class="loader" id="loader">Loading...</div>
                              </div>
                              <p style="text-align:center"><strong>Cargando mapa...</strong></p>
                            </div>
                            <div class="table-responsive">
                              <table class="table table-condensed">
                                  <thead>
                                      <tr style="color: #00529e;font-weight: 500;">
                                          <td>Ubicación</td>
                                          <td>Comuna</td>
                                          <td>Distancia</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($ubicacion_maquinas as $ubicacion_maquina)
                                      <tr>
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
function initMap(){
  
  navigator.geolocation.getCurrentPosition(showPosition,showError);
  function showPosition(position)
    {
    lat=position.coords.latitude;
    
    lon=position.coords.longitude;
    latlon=new google.maps.LatLng(lat, lon);
    mapholder=document.getElementById('mapholder');
    mapholder.style.height='250px';
    var myOptions={
    center:latlon,zoom:10,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    mapTypeControl:false,
    //timeout: 50000000,
    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    };
    //var PositionOptions = {
    //timeout: 5000,
    //maximumAge: 60000,
    //enableHighAccuracy: true
    //};
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
      document.getElementById("distancia{{ $ubicacion_maquina->id }}").innerHTML=d{{ $ubicacion_maquina->id }}.toFixed(3) + " Kms";
    @endforeach  
    }
  function showError(error)
    {
      var x='';
    switch(error.code) 
      {
      case error.PERMISSION_DENIED:
        alert("Denegada la peticion de Geolocalización en el navegador.")
        break;
      case error.POSITION_UNAVAILABLE:
        alert("La información de la localización no esta disponible.")
        break;
      case error.TIMEOUT:
        alert("El tiempo de petición ha expirado.")
        break;
      case error.UNKNOWN_ERROR:
        alert("Ha ocurrido un error desconocido.")
        break;
      }
    }
}  
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBso25wWBAGogK7OoheU_UqEIm10Y2Gyn8&callback=initMap"></script>
@endif
@if (auth()->user()->admin == '1') 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Comunas', 'Unidades recicladas'],
      @foreach ($resumen_comunas as $resumen_comuna)
      ['{{$resumen_comuna->name}}\n{{$resumen_comuna->cantidad}}', {{$resumen_comuna->cantidad}}],
      @endforeach
    ]);
    var options = {
      chart: {
        title: 'Cantidad Reciclada por Comunas, mes actual',
      }
    };
    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
    chart.draw(data, google.charts.Bar.convertOptions(options));


    var data = google.visualization.arrayToDataTable([
      ['Usuarios', 'Unidades recicladas',],
      @foreach ($resumen_usuarios as $resumen_usuario)
      ['{{$resumen_usuario->name}}\n{{$resumen_usuario->cantidad}}', {{$resumen_usuario->cantidad}}],
      @endforeach
    ]);
    var options = {
      chart: {
        title: 'Cantidad Reciclada por Usuarios, mes actual',
      }
    };
    var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>
<div class="main main-raised">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div id="columnchart_material"></div> 
      </div>
      <div class="col-sm-6">
        <div id="columnchart_material2"></div> 
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
       <div class="table-responsive">
          <h3>TOP 5 de Usuarios Acumulado</h3>
          <table class="table table-condensed">
              <thead>
                  <tr style="color: #00529e;font-weight: 500;">
                      <td>Nombre Usuario</td>
                      <td>Cantidad Reciclada</td>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($top_five_usuarios_todo_periodo as $top)
                  <tr>
                      <td>{{ $top->name}}</td>
                      <td>{{ $top->cantidad}}</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="table-responsive">
          <h3>Solicitudes de Canje Pendientes</h3>
          <table class="table table-condensed">
            <thead>
                <tr style="color: #00529e;font-weight: 500;">
                    <td>Nombre de Usuario</td>
                    <td>Número BIP</td>
                    <td>Eco Puntos a Canjear</td>
                    <td>Pesos Chilenos</td>
                    <td>Fecha</td>
                    <td class="td-actions text-right">Opciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($exchanges as $exchange)
                <tr>
                    <td>{{ $exchange->user->name}}</td>
                    <td>{{ $exchange->number_bip}}</td>
                    <td>{{ $exchange->quantity_eco}}</td>
                    <td>{{ $exchange->clp}}</td>
                    <td>{{ $exchange->transaction_date}}</td>
                    <td class="td-actions text-right">
                        <form action="{{ url('/admin/exchange/'.$exchange->id.'/change') }}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" rel="tooltip" title="Marcar como Procesado" class="btn btn-danger btn-simple btn-xs">
                                <i class="fa fa-check"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
@endif
@include('includes.footer')
@endsection
