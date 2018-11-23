@extends('layouts.app')

@section('title', 'Mensajes')
@section('body-class', 'product-page')

@section('content')
<style>
    .tt-query { /* UPDATE: newer versions use tt-input instead of tt-query */
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    }

    .tt-hint {
        color: #999;
    }

    .tt-menu { /* UPDATE: newer versions use tt-menu instead of tt-dropdown-menu */
        width: 422px;
        margin-top: 12px;
        padding: 8px 0;
        background-color: #fff;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        box-shadow: 0 5px 10px rgba(0,0,0,.2);
    }

    .tt-suggestion {
        padding: 3px 20px;
        font-size: 18px;
        line-height: 24px;
    }

    .tt-suggestion.tt-is-under-cursor { /* UPDATE: newer versions use .tt-suggestion.tt-cursor */
        color: #fff;
        background-color: #0097cf;

    }

    .tt-suggestion p {
        margin: 0;
    }
</style>
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Crear nuevo mensaje</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif        
            <form name="form" class="form" method="POST" action="{{ url('/admin/message/create') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating" id="correos">
                            <label class="control-label">Destinatarios</label>
                        
                            <a href="#" onclick="AgregarCampos();">Agregar Correo</a>
                            <div id="campos">
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Comentarios</label>
                            <textarea class="form-control" name="comment" id="comment" placeholder="Escriba Aquí su mensaje, este puede tener hasta 191 caracteres" maxlength="191" cols="30" rows="10" required onKeyDown="cuenta()" onKeyUp="cuenta()">{{ old('comment') }}</textarea>
                            <input type="text" name="caracteres" size="4" class="form-control" disabled="">Caracteres
                        </div>
                    </div>
                </div>                  
                <button class="btn btn-primary">Enviar Mensaje</button>
                <a href="{{ url('/admin/message') }}" class="btn btn-default">Cancelar</a>
            </form>
        </div>

    </div>

</div>
<script> 
function cuenta(){ 
        document.form.caracteres.value =document.form.comment.value.length 
} 
</script>
@include('includes.footer')
@endsection
@section('scripts')
    <script src="{{ asset('js/typeahead.bundle.min.js') }}"></script>
    <script>
        var nextinput = 0;
        function AgregarCampos(){
            nextinput++;
            campo = '<input class="form-control" type="text" size="100" id="search' + nextinput + '" name="destinatarios[]"><a href="#" id="remover'+nextinput+'">Eliminar</a><br>';
            $("#campos").append(campo);
            $('#remover'+nextinput).click(function(event) {
            $('#search'+nextinput).remove();
            $('#remover'+nextinput).remove();
            nextinput--;
            });
            $(function(){
                var correos = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    prefetch: '{{ url("/admin/message/json") }}'
                });
                $('#search'+nextinput).typeahead({
                    hint:true,
                    highlight:true,
                    minLength: 1
                },{
                    name: 'correos',
                    source: correos
                });
            });
        }
        var next = 0;
        //function remover(){
            //next++;
           // $('#search1').remove('#remover1');
           // $('#remover1').remove();
           // alert(next);
        //}
        //$('#remover1').click(function(event) {
        //$('#search1').remove();
        //});
        //var nextinput = 0;
        //alert(nextinput);
        //function Remover(){
        //    nextinput++;
        //    $('#search'+nextinput).remove();
        //}
        






       
    </script>
    <script type="text/javascript">

</script>
@endsection

