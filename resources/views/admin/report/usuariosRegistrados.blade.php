@extends('layouts.app')

@section('title', 'Reporte Usuarios Registrados')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Reporte Usuarios Registrados</h2>

            <div class="team">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="columnchart_material"></div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="columnchart_material2"></div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="columnchart_material3"></div> 
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Mes', 'Usuarios Registrados'],
      @foreach ($resumen_usuarios_mes as $resumen)
      ['{{$resumen->mes}}', {{$resumen->cantidad}}],
      @endforeach
    ]);
    var options = {
      chart: {
        title: 'Usuarios Registrados por mes.',
      }
    };
    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
    //grafico dia
    var data = google.visualization.arrayToDataTable([
      ['Día', 'Usuarios Registrados'],
      @foreach ($resumen_usuarios_dia as $resumen_dia)
      ['{{$resumen_dia->dia}}', {{$resumen_dia->cantidad}}],
      @endforeach
    ]);
    var options = {
      chart: {
        title: 'Usuarios Registrados por día de la semana.',
      }
    };
    var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));
    chart.draw(data, google.charts.Bar.convertOptions(options));

    //grafico hora
    var data = google.visualization.arrayToDataTable([
      ['Hora', 'Usuarios Registrados'],
      @foreach ($resumen_usuarios_hora as $resumen_hora)
      ['{{$resumen_hora->hora}}', {{$resumen_hora->cantidad}}],
      @endforeach
    ]);
    var options = {
      chart: {
        title: 'Usuarios Registrados por Hora.',
      }
    };
    var chart = new google.charts.Bar(document.getElementById('columnchart_material3'));
    chart.draw(data, google.charts.Bar.convertOptions(options));




   
  }
</script>
@include('includes.footer')
@endsection