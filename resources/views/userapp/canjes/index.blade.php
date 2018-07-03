@extends('layouts.app')

@section('title', 'Mi Actividad')
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
            <h2 class="title text-center">Mi Saldo<br>{{ $user_saldo }} Ecopesos</h2>       
            <h5 class="title text-center" style="color:red">DISPONIBLE PARA CANJE</h5>
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
                    <div class="container" id="bip" style="display:none">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Número tarjeta Bip</label>
                                     <input type="text" class="form-control" name="number_bip" value="{{ old('number_bip') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                  <label class="control-label">Cantidad de Eco a canjear</label>
                                  <input type="number" class="form-control" name="quantity_eco" value="{{ old('quantity_eco') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container" id="donatario" style="display:none">
                        <div class="row">  
                            <div class="col-sm-6">
                                <label class="control-label">Seleccione Donatario</label>
                                <select name="company_id" class="form-control">
                                    <option value="0"></option>
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
                                  <input type="number" class="form-control" name="quantity_eco" value="{{ old('quantity_eco') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success">Canjear</button>
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

