@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.cliente.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.cliente.fields.rut')</th>
                            <td>{{ $cliente->rut }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.cliente.fields.dv')</th>
                            <td>{{ $cliente->dv }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.cliente.fields.nombre')</th>
                            <td>{{ $cliente->nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.cliente.fields.direccion-factura')</th>
                            <td>{{ $cliente->direccion_factura }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.cliente.fields.direccion-despacho')</th>
                            <td>{{ $cliente->direccion_despacho }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.cliente.fields.comuna')</th>
                            <td>{{ $cliente->comuna->nombre or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#facturas" aria-controls="facturas" role="tab" data-toggle="tab">Facturas</a></li>
<li role="presentation" class=""><a href="#contactocliente" aria-controls="contactocliente" role="tab" data-toggle="tab">Contacto cliente</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="facturas">
<table class="table table-bordered table-striped {{ count($facturas) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.facturas.fields.folio')</th>
                        <th>@lang('quickadmin.facturas.fields.vendedor')</th>
                        <th>@lang('quickadmin.facturas.fields.fecha')</th>
                        <th>@lang('quickadmin.facturas.fields.cliente')</th>
                        <th>@lang('quickadmin.facturas.fields.producto')</th>
                        <th>@lang('quickadmin.facturas.fields.cantidad')</th>
                        <th>@lang('quickadmin.facturas.fields.precio')</th>
                        <th>@lang('quickadmin.facturas.fields.condicion-pago')</th>
                        <th>@lang('quickadmin.facturas.fields.estado-pago')</th>
                        <th>@lang('quickadmin.facturas.fields.documento-valido')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($facturas) > 0)
            @foreach ($facturas as $factura)
                <tr data-entry-id="{{ $factura->id }}">
                    <td>{{ $factura->folio }}</td>
                                <td>{{ $factura->vendedor->name or '' }}</td>
                                <td>{{ $factura->fecha }}</td>
                                <td>{{ $factura->cliente->nombre or '' }}</td>
                                <td>{{ $factura->producto->nombre or '' }}</td>
                                <td>{{ $factura->cantidad }}</td>
                                <td>{{ $factura->precio }}</td>
                                <td>{{ $factura->condicion_pago }}</td>
                                <td>{{ Form::checkbox("estado_pago", 1, $factura->estado_pago == 1, ["disabled"]) }}</td>
                                <td>{{ Form::checkbox("documento_valido", 1, $factura->documento_valido == 1, ["disabled"]) }}</td>
                                <td>
                                    @can('factura_view')
                                    <a href="{{ route('facturas.show',[$factura->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('factura_edit')
                                    <a href="{{ route('facturas.edit',[$factura->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('factura_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['facturas.destroy', $factura->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="14">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="contactocliente">
<table class="table table-bordered table-striped {{ count($contacto_clientes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.contacto-cliente.fields.nombre')</th>
                        <th>@lang('quickadmin.contacto-cliente.fields.apellido')</th>
                        <th>@lang('quickadmin.contacto-cliente.fields.telefono')</th>
                        <th>@lang('quickadmin.contacto-cliente.fields.email')</th>
                        <th>@lang('quickadmin.contacto-cliente.fields.cliente')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($contacto_clientes) > 0)
            @foreach ($contacto_clientes as $contacto_cliente)
                <tr data-entry-id="{{ $contacto_cliente->id }}">
                    <td>{{ $contacto_cliente->nombre }}</td>
                                <td>{{ $contacto_cliente->apellido }}</td>
                                <td>{{ $contacto_cliente->telefono }}</td>
                                <td>{{ $contacto_cliente->email }}</td>
                                <td>{{ $contacto_cliente->cliente->nombre or '' }}</td>
                                <td>
                                    @can('contacto_cliente_view')
                                    <a href="{{ route('contacto_clientes.show',[$contacto_cliente->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('contacto_cliente_edit')
                                    <a href="{{ route('contacto_clientes.edit',[$contacto_cliente->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('contacto_cliente_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['contacto_clientes.destroy', $contacto_cliente->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('clientes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop