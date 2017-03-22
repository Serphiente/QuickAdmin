@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.comuna.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.comuna.fields.nombre')</th>
                            <td>{{ $comuna->nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.comuna.fields.provincia')</th>
                            <td>{{ $comuna->provincia->nombre or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#laboratorio" aria-controls="laboratorio" role="tab" data-toggle="tab">Laboratorio</a></li>
<li role="presentation" class=""><a href="#cliente" aria-controls="cliente" role="tab" data-toggle="tab">Cliente</a></li>
<li role="presentation" class=""><a href="#proveedor" aria-controls="proveedor" role="tab" data-toggle="tab">Proveedor</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="laboratorio">
<table class="table table-bordered table-striped {{ count($laboratorios) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.laboratorio.fields.nombre')</th>
                        <th>@lang('quickadmin.laboratorio.fields.rut')</th>
                        <th>@lang('quickadmin.laboratorio.fields.dv')</th>
                        <th>@lang('quickadmin.laboratorio.fields.direccion')</th>
                        <th>@lang('quickadmin.laboratorio.fields.ciudad')</th>
                        <th>@lang('quickadmin.laboratorio.fields.telefono')</th>
                        <th>@lang('quickadmin.laboratorio.fields.email')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($laboratorios) > 0)
            @foreach ($laboratorios as $laboratorio)
                <tr data-entry-id="{{ $laboratorio->id }}">
                    <td>{{ $laboratorio->nombre }}</td>
                                <td>{{ $laboratorio->rut }}</td>
                                <td>{{ $laboratorio->dv }}</td>
                                <td>{{ $laboratorio->direccion }}</td>
                                <td>{{ $laboratorio->ciudad->nombre or '' }}</td>
                                <td>{{ $laboratorio->telefono }}</td>
                                <td>{{ $laboratorio->email }}</td>
                                <td>
                                    @can('laboratorio_view')
                                    <a href="{{ route('laboratorios.show',[$laboratorio->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('laboratorio_edit')
                                    <a href="{{ route('laboratorios.edit',[$laboratorio->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('laboratorio_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['laboratorios.destroy', $laboratorio->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="cliente">
<table class="table table-bordered table-striped {{ count($clientes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.cliente.fields.rut')</th>
                        <th>@lang('quickadmin.cliente.fields.dv')</th>
                        <th>@lang('quickadmin.cliente.fields.nombre')</th>
                        <th>@lang('quickadmin.cliente.fields.direccion-factura')</th>
                        <th>@lang('quickadmin.cliente.fields.direccion-despacho')</th>
                        <th>@lang('quickadmin.cliente.fields.comuna')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($clientes) > 0)
            @foreach ($clientes as $cliente)
                <tr data-entry-id="{{ $cliente->id }}">
                    <td>{{ $cliente->rut }}</td>
                                <td>{{ $cliente->dv }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->direccion_factura }}</td>
                                <td>{{ $cliente->direccion_despacho }}</td>
                                <td>{{ $cliente->comuna->nombre or '' }}</td>
                                <td>
                                    @can('cliente_view')
                                    <a href="{{ route('clientes.show',[$cliente->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('cliente_edit')
                                    <a href="{{ route('clientes.edit',[$cliente->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('cliente_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['clientes.destroy', $cliente->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="proveedor">
<table class="table table-bordered table-striped {{ count($proveedors) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.proveedor.fields.nombre')</th>
                        <th>@lang('quickadmin.proveedor.fields.rut')</th>
                        <th>@lang('quickadmin.proveedor.fields.dv')</th>
                        <th>@lang('quickadmin.proveedor.fields.direccion')</th>
                        <th>@lang('quickadmin.proveedor.fields.telefono')</th>
                        <th>@lang('quickadmin.proveedor.fields.email')</th>
                        <th>@lang('quickadmin.proveedor.fields.comuna')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($proveedors) > 0)
            @foreach ($proveedors as $proveedor)
                <tr data-entry-id="{{ $proveedor->id }}">
                    <td>{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->rut }}</td>
                                <td>{{ $proveedor->dv }}</td>
                                <td>{{ $proveedor->direccion }}</td>
                                <td>{{ $proveedor->telefono }}</td>
                                <td>{{ $proveedor->email }}</td>
                                <td>{{ $proveedor->comuna->nombre or '' }}</td>
                                <td>
                                    @can('proveedor_view')
                                    <a href="{{ route('proveedors.show',[$proveedor->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('proveedor_edit')
                                    <a href="{{ route('proveedors.edit',[$proveedor->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('proveedor_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['proveedors.destroy', $proveedor->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('comunas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop