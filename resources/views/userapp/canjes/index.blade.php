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
        <div class="section">
            <h2 class="title text-center">Mi Saldo<br>{{ $total_nc }} Ecopesos</h2>       
            <h5 class="title text-center" style="color:red">DISPONIBLE PARA CANJE {{ $total_saldo_contable }}</h5>
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif 
                @if (session('mensaje'))
                  <div class="alert alert-danger">
                      {{ session('mensaje') }}
                  </div>
                @endif       
                  
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group label-floating">
                          <label class="control-label">Seleccione el Tipo de Canje</label>
                          <select name="tipo_canje" id="tipo_canje" class="form-control" onchange="canje(this)">
                              <option value="0">Seleccione</option>
                              <option value="BIP">Solicitud de carga Bip</option>
                              <option value="DONAR">Donar</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <form action="{{ url('/userapp/canjes/confirmed') }}" method="post">
                    {{ csrf_field() }}
                      <div class="container" id="bip" style="display:none">
                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Número tarjeta Bip</label>
                                       <input type="number" class="form-control" name="number_bip" value="{{ old('number_bip') }}" required>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group label-floating">
                                    <label class="control-label">Cantidad de Eco a canjear</label>
                                    <input type="number" max="{{ $total_saldo_contable }}" class="form-control" name="quantity_eco" value="{{ old('quantity_eco') }}" required>
                                  </div>
                              </div>
                          </div>
                          <button class="btn btn-success">Canjear</button>
                      </div>
                    </form>  
                    <form action="{{ url('/userapp/canjes/confirmed') }}" method="post">
                    {{ csrf_field() }}
                      <div class="container" id="donatario" style="display:none">
                          <div class="row">  
                              <div class="col-sm-6">
                                  <label class="control-label">Seleccione Donatario</label>
                                  <select name="grantee_id" class="form-control" required>
                                      <option value=""></option>
                                      @foreach ($grantees as $grantee)
                                          <option value="{{ $grantee->id }}">{{ $grantee->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group label-floating">
                                    <label class="control-label">Cantidad de Eco a canjear</label>
                                    <input type="number" max="{{ $total_saldo_contable }}" class="form-control" name="quantity_eco_donar" value="{{ old('quantity_eco_donar') }}" required>
                                  </div>
                              </div>
                          </div>
                          <button class="btn btn-success">Canjear</button>
                      </div>
                    </form>  
        </div>
    </div>

</div>
<script>
function canje(sel) {
      if (sel.value=="BIP"){
           divB = document.getElementById("bip");
           divB.style.display = "";

           divD = document.getElementById("donatario");
           divD.style.display = "none";

      }else{

           divB = document.getElementById("bip");
           divB.style.display="none";

           divD = document.getElementById("donatario");
           divD.style.display = "";
      }

      if (sel.value=="0"){
            divB = document.getElementById("bip");
            divB.style.display="none";

            divD = document.getElementById("donatario");
            divD.style.display = "none";
      }
}
</script>
@include('includes.footeruserapp')
@endsection

