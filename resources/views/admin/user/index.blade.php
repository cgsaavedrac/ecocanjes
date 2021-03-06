@extends('layouts.app')

@section('title', 'Usuarios del Sistema')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Listado de Usuarios</h2>

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/user/create') }}" class="btn btn-primary btn-round">Nuevo Usuario</a>
                    <!-- Buscador -->
                    <form action="" method="GET">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Buscar...">
                        </div>
                    </form>
                    <!-- Fin del buscador -->
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <th class="text-center">ID</th>
                                    <th class="col-md-2 text-center">Nombre</th>
                                    <th class="col-md-2 text-center">Correo</th>
                                    <th class="col-md-2 text-center">Fecha nacimiento</th>
                                    <th class="col-md-2 text-center">Región</th>
                                    <th class="col-md-2 text-center">Comuna</th>
                                    <th class="col-md-2 text-center">Fecha Registro</th>
                                    <th class="col-md-2 text-center">Tipo de Usuario</th>
                                    <th class="td-actions text-right">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{ $user->id}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ $user->birth_date ? $user->birth_date : 'Sin dato' }}</td>
                                    <td>{{ $user->region ? $user->region->name : 'Sin dato'}}</td>
                                    <td>{{ $user->city ? $user->city->name : 'Sin dato'}}</td>
                                    <td>{{ $user->created_at}}</td>
                                    @if ($user->admin == 1)
                                    <td>Administrador</td>
                                    @endif
                                    @if ($user->admin == 0)
                                    <td>Usuario APP</td>
                                    @endif
                                    <td class="td-actions text-right">
                                        <a href="{{ url('/admin/user/'.$user->id.'/edit') }}" rel="tooltip" title="Editar Usuario" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/user/'.$user->id.'/delete') }}" onclick="return confirm('¿Esta seguro de eliminar este registro?')" rel="tooltip" title="Eliminar Usuario" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}
                </div>
                <a href="{{ url('admin/user/excel_user') }}" class="btn btn-success btn-sm">Exportar a Excel</a>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection