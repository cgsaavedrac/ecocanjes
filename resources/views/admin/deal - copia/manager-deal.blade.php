@extends('layouts.app')

@section('title', 'Manejo de Negocio')
@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/bg4.jpeg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        
        <div class="col-sm-12">
            <div class="section">
                <h2 class="text-center title" style="color: #00529e">Flujo del negocio</h2>
                <h4 class="text-center title" style="color: #00529e">Etapa actual: {{ $deal->status }}</h4>
                <a href="{{ url('/admin/deal/'.$deal->id.'/Abierto/manager-deal/changeStatus') }}" class="btn btn-primary btn-round">
                    <i class="material-icons">create</i> Abierto
                </a>
                <a href="{{ url('/admin/deal/'.$deal->id.'/Primer Contacto/manager-deal/changeStatus') }}" class="btn btn-primary btn-round">
                    <i class="material-icons">call</i> Primer Contacto
                </a>
                <a href="{{ url('/admin/deal/'.$deal->id.'/Calificado/manager-deal/changeStatus') }}" class="btn btn-primary btn-round">
                    <i class="material-icons">favorite</i> Calificado
                </a>
                <a href="{{ url('/admin/deal/'.$deal->id.'/Cotizacion/manager-deal/changeStatus') }}" class="btn btn-primary btn-round">
                    <i class="material-icons">description</i> Cotización
                </a>
                <a href="{{ url('/admin/deal/'.$deal->id.'/Presentacion/manager-deal/changeStatus') }}" class="btn btn-primary btn-round">
                    <i class="material-icons">assignment</i> Presentación
                </a>
                <a href="{{ url('/admin/deal/'.$deal->id.'/Envio de Contrato/manager-deal/changeStatus') }}" class="btn btn-primary btn-round">
                    <i class="material-icons">chrome_reader_mode</i> Envío de Contrato
                </a>
                <a href="{{ url('/admin/deal/'.$deal->id.'/Cierre ganado/manager-deal/changeStatus') }}" class="btn btn-primary btn-round">
                    <i class="material-icons">thumb_up</i> Cierre ganado
                </a>
                <a href="{{ url('/admin/deal/'.$deal->id.'/Cierre perdido/manager-deal/changeStatus') }}" class="btn btn-primary btn-round">
                    <i class="material-icons">thumb_down</i> Cierre perdido
                </a>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="section">
                <h2 class="title text-left" style="color: #00529e">Manejo del negocio</h2>     
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Titulo: {{ $deal->title }}</h4>
                    </div>
                </div> 
                <div class="row">
                    <h3 style="color: #00529e">Datos del Contacto</h3>
                    <div class="col-sm-6">
                        <h4>Empresa: {{ $deal->company->name }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <h4>Contacto: {{ $deal->contact->name }}</h4>
                    </div>
                </div>
                <div class="row">
                    <h3 style="color: #00529e">Datos del Negocio</h3>
                    <div class="col-sm-12">
                        <h4>Requerimiento: {{ $deal->request }}</h4>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Monto del negocio: {{ $deal->amount }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <h4>Fecha estimada de cierre: {{ $deal->closing_date }}</h4>
                    </div>
                </div> 
            </div>
        </div>

        <div class="col-sm-5">
            <div class="section">
                <h2 class="title text-left" style="color: #00529e">Actividades</h2>
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
                    Nueva actividad
                    <button class="btn btn-primary btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                    </button>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr style="color: #00529e;font-weight: 500;">
                                    <td class="text-center">ID</td>
                                    <td>Tipo Actividad</td>
                                    <td>Titulo</td>
                                    <td>Descripción</td>
                                    <td>Fecha Actividad</td>
                                    <td>Estado</td>
                                    <td style="padding: 0px">Opciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activities as $activity)
                                <tr>
                                    <td class="text-center">{{ $activity->id}}</td>
                                    <td>{{ $activity->type_activity->name}}</td>
                                    <td>{{ $activity->title}}</td>
                                    <td>{{ $activity->description}}</td>
                                    <td>{{$activity->expiration_date}}</td>
                                    <td>{{ $activity->status}}</td>
                                    <td class="td-actions text-right">
                                        <form action="{{ url('/admin/deal/'.$activity->id.'/manager-deal/delete') }}" method="post">
                                            {{ csrf_field() }}
                                            <a href="{{ url('/admin/deal/'.$activity->id.'/manager-deal/change') }}" rel="tooltip" title="Marcar como realizada" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="submit" rel="tooltip" title="Eliminar Actividad" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $activities->links() }}
                </div>  
            </div>
        </div>     
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar actividad</h4>
            </div>
            <form action="{{ url('admin/deal/'.$deal->id.'/manager-deal') }}" method="post" name="form-insert">
                {{ csrf_field() }}
                <div class="modal-body">
                    <label class="control-label">Seleccione Tipo de Actividad</label>
                    <select name="type_activity_id" id="type_activity_id" class="form-control">
                        <option value="0"></option>
                        @foreach ($type_activities as $type_activity)
                        <option value="{{ $type_activity->id }}">{{ $type_activity->name }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="id" class="form-control">
                    <input type="hidden" value="{{ $deal->id }}" name="deal_id">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Titulo</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Descripción</label>
                                <textarea class="form-control" placeholder="Descripción de la actividad" rows="5" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Fecha de la actividad</label>
                                <div class="form-group label-floating" data-date-format="yyyy-mm-dd">
                            <input class="form-control" type="date" name="expiration_date" />
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info btn-simple">Añadir</button>
                </div>
            </form>
        </div>
    </div>  
</div>
@include('includes.footer')
@endsection

