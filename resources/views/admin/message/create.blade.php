@extends('layouts.app')

@section('title', 'Mensajes')
@section('body-class', 'product-page')

@section('content')
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
            <form class="form" method="POST" action="{{ url('/admin/message/create') }}">
                {{ csrf_field() }}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Destinatarios</label>
                            @foreach($users as $user)
                             
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="destinatarios[]" id="destinatarios" value="{{$user->id }}">
                                        {{$user->name}}
                                    </label>
                                   
                                
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Comentarios</label>
                            <textarea class="form-control" name="comment" id="comment" cols="30" rows="10" required>{{ old('comment') }}</textarea>
                        </div>
                    </div>
                </div>                  
                <button class="btn btn-primary">Enviar Mensaje</button>
                <a href="{{ url('/admin/message') }}" class="btn btn-default">Cancelar</a>
            </form>
        </div>

    </div>

</div>
@include('includes.footer')
@endsection

