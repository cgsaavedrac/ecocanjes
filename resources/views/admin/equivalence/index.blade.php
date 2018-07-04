@extends('layouts.app')

@section('title', 'Equivalencias del Sistema')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title" style="color: #00529e">Listado de Equivalencias</h2>

            <div class="team">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <th class="col-md-2 text-center">Nombre Equivalencia</th>
                                    <th class="col-md-2 text-center">Unidad</th>
                                    <th class="col-md-2 text-center">Equivalencia</th>
                                    <th class="td-actions text-right">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($equivalences as $equivalence)
                                <tr>
                                    <td>{{ $equivalence->name_equivalence}}</td>
                                    <td>{{ $equivalence->equivalence_amount }}{{ substr($equivalence->name_equivalence, '0', '3') }}</td>
                                    <td>{{ $equivalence->equivalence_factor}}{{ substr($equivalence->name_equivalence, '4', '3') }}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ url('/admin/equivalence/'.$equivalence->id.'/edit') }}" rel="tooltip" title="Editar equivalencia" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $equivalences->links() }}
                </div>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection