@extends('layouts.app')

@section('title', 'Banner Inicio')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Imagenes del Banner Publicitario</h2>

            <form method="post" action="" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="file" name="photo" required>
                <button type="submit" class="btn btn-primary btn-round">Nueva Imagen</button>
            </form>
            <div class="team">
                <div class="row">
                    
                    <div class="row">
                    @foreach ($banners as $banner)
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <img src="{{ $banner->url }}" alt="" class="img-responsive">
                                    <form action="{{ url('/admin/banner/'.$banner->id.'/delete') }}" method="post">
                                            {{ csrf_field() }}
                                            <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-round">Eliminar Imagen</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection