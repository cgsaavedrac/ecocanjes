@extends('layouts.app')

@section('title', 'Ecocanjes')
@section('body-class', 'product-page')

@section('content')
@if (auth()->user()->admin == '0')  

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

.map-responsive{
    left:0;
    bottom: 193px;
    height:80%;
    width:100%;
    position: absolute;
    z-index: -1;
    
  }

.footer2{
    position: fixed;
    width: 100%;
    height: 20%;
    bottom: 60px;
    z-index: 100;/* Depende el valor segun las capas flotantes que tengas */
    left: 0; /* Depende el Ancho de donde se va a colocar */
} 
</style>   
<div id="mapholder" class="map-responsive">
  
  <div class="loader" id="loader">Loading...</div>
  <p style="text-align:center"><strong>Cargando mapa...</strong></p>
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

      var myOptions={
      center:latlon,zoom:10,
      mapTypeId:google.maps.MapTypeId.ROADMAP,
      mapTypeControl:false,
      navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
      };
      
      rad = function(x) {return x*Math.PI/180;}
      var latitud = lat;
      var longitud = lon;
      var R = 6378.137; //Radio de la tierra en km

      var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
      var marker=new google.maps.Marker({position:latlon,map:map,title:"Tú estas aquí!"});
      @foreach ($ubicacion_maquinas as $ubicacion_maquina)

        var lat{{ $ubicacion_maquina->id }} = {{ $ubicacion_maquina->latitude }};
        var lon{{ $ubicacion_maquina->id }} = {{ $ubicacion_maquina->longitude }};
        var dLat{{ $ubicacion_maquina->id }} = rad( lat{{ $ubicacion_maquina->id }} - latitud );
        var dLong{{ $ubicacion_maquina->id }} = rad( lon{{ $ubicacion_maquina->id }} - longitud );
        var a{{ $ubicacion_maquina->id }} = Math.sin(dLat{{ $ubicacion_maquina->id }}/2) * Math.sin(dLat{{ $ubicacion_maquina->id }}/2) + Math.cos(rad(latitud)) * Math.cos(rad(lat{{ $ubicacion_maquina->id }})) * Math.sin(dLong{{ $ubicacion_maquina->id }}/2) * Math.sin(dLong{{ $ubicacion_maquina->id }}/2);
        var c{{ $ubicacion_maquina->id }} = 2 * Math.atan2(Math.sqrt(a{{ $ubicacion_maquina->id }}), Math.sqrt(1-a{{ $ubicacion_maquina->id }}));
        var d{{ $ubicacion_maquina->id }} = R * c{{ $ubicacion_maquina->id }};
        latlon{{$ubicacion_maquina->id}}=new google.maps.LatLng({{ $ubicacion_maquina->latitude }},{{ $ubicacion_maquina->longitude }})

        var contentString{{$ubicacion_maquina->id}} = 'A '+d{{ $ubicacion_maquina->id }}.toFixed(0)+' kms, '+'{{$ubicacion_maquina->address}}'+'<br>'+'{{$ubicacion_maquina->days_attention}}'+', '+'{{$ubicacion_maquina->hours_attention}}' ;
          var infowindow{{$ubicacion_maquina->id}} = new google.maps.InfoWindow({
            content: contentString{{$ubicacion_maquina->id}}
          });
        var marker{{$ubicacion_maquina->id}} = new google.maps.Marker({
            position: latlon{{$ubicacion_maquina->id}},
            map: map,
            title: 'Reciclar aquí',
            icon: '{{ asset('img/Icono_mapa.png') }}'
          });
          marker{{$ubicacion_maquina->id}}.addListener('click', function() {
            infowindow{{$ubicacion_maquina->id}}.open(map, marker{{$ubicacion_maquina->id}});
          });
      
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
<!--KEY DE PESIC<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBso25wWBAGogK7OoheU_UqEIm10Y2Gyn8&callback=initMap"></script>-->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfwxv9lL4h3oUqmYVBHkm2ie0tqyJZXFA&callback=initMap"></script>


<div class="footer2" style="margin-bottom: 0px;background-color: #4caf50;color: #ffffff !important">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="{{ $banner ? $banner->url : ''  }}" class="img-responsive">
      </div>
      @foreach ($banners as $banner)
        <div class="item">
          <img src="{{ $banner ? $banner->url : ''  }}" class="img-responsive">
        </div>
      @endforeach
    </div>
  </div>
</div>
@include('includes.footeruserapp')
@endif



<!-- PANTALLA ADMIN -->

@if (auth()->user()->admin == '1') 
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>
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
        <h3 style="color:#4caf50">Canjes</h3>
        <h4>Cargas BIP</h4>
        <h5>Pendientes {{ $cantidad_canjes_bip_pendientes }} solicitud pendiente - <a href="/admin/exchange">Ir a Canjes</a></h5>
        <h4>Donaciones</h4>
        <h5>Pendientes {{ $cantidad_donaciones_pendientes }} solicitud pendiente - <a href="/admin/exchange/donaciones">Ir a Donaciones</a></h5>   
      </div>
      <div class="col-sm-6">
        <h3 style="color:#4caf50">Indicadores de Impacto</h3>
        <h5>Monto total canjeado BIP ${{ $monto_total_canjeado_bip }}</h5>
        <hr>
        <h5>Monto total donado ${{ $monto_total_donado }}</h5>
        <div class="table-responsive">
          <table class="table table-condensed">
            <thead>
              <tr>
                <td>Fundación</td>
                <td>Cantidad</td>
              </tr>
            </thead>
            <tbody>
              @foreach($donado_por_fundaciones as $donado_fundacion)
              <tr>
                <td>{{ $donado_fundacion->name }}</td>
                <td>${{ $donado_fundacion->suma_donatario }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>  
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h3 style="color:#4caf50">Financiero</h3>
        <h5>Total de saldos disponibles para canje ECO{{ $total_saldo_contable }}</h5> 
        <h5>Total cobrado ${{ $total_cobrados }}</h5>  
        <h5>Total material reciclado {{ $basura_ahorrada }}Kg</h5> 
        <h5>Material vendido {{ number_format($cantidad_vendida, 0, ',', '.') }}Kg - ${{ number_format($monto_vendido, 0, ',', '.') }}</h5>
        <a href="/admin/sale">Ir a Ventas</a>
      </div>
      <div class="col-sm-6">
        <h3 style="color:#4caf50">Usuarios</h3>
        <h5>Total usuarios {{ $total_usuarios }}</h5>
        <a href="/admin/user">Ver usuarios</a>
        <div class="table-responsive">
          <h5>TOP 10 de Usuarios Acumulado</h5>
          <table class="table table-condensed">
              <thead>
                  <tr style="color: #00529e;font-weight: 500;">
                      <td>Nombre Usuario</td>
                      <td>Cantidad Reciclada</td>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($top_ten_usuarios_todo_periodo as $top)
                  <tr>
                      <td>{{ $top->name}}</td>
                      <td>{{ $top->cantidad}}</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>  
      </div>
    </div>




    <div class="row">
      <div class="col-sm-6">
        <div id="columnchart_material"></div> 
      </div>
      <div class="col-sm-6">
        <div id="columnchart_material2"></div> 
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="table-responsive">
          <h3>Solicitudes de Canje Pendientes BIP</h3>
          <table class="table table-condensed">
            <thead>
                <tr style="color: #00529e;font-weight: 500;">
                    <td>ID</td>
                    <td>Nombre de Usuario</td>
                    <td>Correo</td>
                    <td>Número BIP</td>
                    <td>Eco Puntos a Canjear</td>
                    <td>Pesos Chilenos</td>
                    <td>Fecha</td>
                    <td>Comentario</td>
                    <td>Estado Solicitud</td>
                    <td class="td-actions text-right">Opciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($exchanges as $exchange)
                <tr>
                    <td>{{ $exchange->id}}</td>
                    <td>{{ $exchange->user->name}}</td>
                    <td>{{ $exchange->user->email }}</td>
                    <td>{{ $exchange->number_bip}}</td>
                    <td>{{ $exchange->quantity_eco}}</td>
                    <td>{{ $exchange->clp}}</td>
                    <td>{{ $exchange->transaction_date}}</td>
                    <td>{{ $exchange->updated_at }} {{ $exchange->comment }}</td>
                    <td>{{ $exchange->status}}</td>
                    <td class="td-actions text-right">
                      <a href="{{ url('/admin/exchange/'.$exchange->id.'/change') }}" onclick="return confirm('¿Esta seguro de procesar este registro?')" rel="tooltip" title="Marcar como procesado" class="btn btn-danger btn-simple btn-xs">
                      <i class="fa fa-check"></i>
                      </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="table-responsive">
          <h3>Solicitudes de Donaciones Pendientes</h3>
          <table class="table table-condensed">
            <thead>
                <tr style="color: #00529e;font-weight: 500;">
                    <td class="text-center">ID</td>
                    <td>Nombre de Usuario</td>
                    <td>Correo</td>
                    <td>Fundación</td>
                    <td>Eco Puntos donados</td>
                    <td>Pesos Chilenos</td>
                    <td>Fecha</td>
                    <td>Comentario</td>
                    <td>Estado Solicitud</td>
                    <td class="td-actions text-right">Opciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($exchange_grantees as $exchange)
                <tr>
                    <td class="text-center">{{ $exchange->id}}</td>
                    <td>{{ $exchange->user->name}}</td>
                    <td>{{ $exchange->user->email }}</td>
                    <td>{{ $exchange->grantee->name}}</td>
                    <td>{{ $exchange->quantity_eco}}</td>
                    <td>{{ $exchange->clp}}</td>
                    <td>{{ $exchange->transaction_date}}</td>
                    <td>{{ $exchange->updated_at }} {{ $exchange->comment }}</td>
                    <td>{{ $exchange->status}}</td>
                    <td class="td-actions text-right">
                        @if($exchange->status == 'Abierto')
                            <a href="{{ url('/admin/exchange/'.$exchange->id.'/change_grantee') }}" onclick="return confirm('¿Esta seguro de procesar este registro?')" rel="tooltip" title="Marcar como procesado" class="btn btn-danger btn-simple btn-xs">
                            <i class="fa fa-check"></i>
                            </a>
                        @endif
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
@include('includes.footer')
@endif
@endsection


