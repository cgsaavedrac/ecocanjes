<style>
.footer{
    position: fixed;
    width: 100%;
    height: 60px;
    bottom: 0;
    z-index: 100;/* Depende el valor segun las capas flotantes que tengas */
    left: 0; /* Depende el Ancho de donde se va a colocar */
} 

#main2 {
    width: 100%;
    height: 60px;
    border: 1px solid #c3c3c3;
    display: -webkit-flex; /* Safari */
    -webkit-flex-direction: row-reverse; /* Safari 6.1+ */
    display: flex;
    flex-direction: row-reverse;
}

#main2 div {
    width: 100%;
    height: 60px;
}

</style>
<div class="footer" style="margin-bottom: 0px;background-color: #4caf50;color: #ffffff !important">
  <div id="main2">
    <div class="text-center"><a href="{{ url('/userapp/comunidad') }}" style="color:#fff"><img src="{{ asset('img/IconosMenuAbajo/comunidad.png') }}" alt="Comunidad"><br>Comunidad</a></div>
    <div class="text-center"><a href="{{ url('/userapp/canjes') }}" style="color:#fff"><img src="{{ asset('img/IconosMenuAbajo/beneficios.png') }}" alt="Beneficios"><br>Beneficios</a></div>
    <div class="text-center"><a href="{{ url('/userapp/actividad') }}" style="color:#fff"><img src="{{ asset('img/IconosMenuAbajo/mi_reciclaje.png') }}" alt="Mi Actividad"><br>Mi actividad</a></div>
    <div class="text-center"><a href="{{ url('/home') }}" style="color:#fff"><img src="{{ asset('img/IconosMenuAbajo/reciclar.png') }}" alt="Reciclar"><br>Reciclar</a></div>
  </div>
</div>
