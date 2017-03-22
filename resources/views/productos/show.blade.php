@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.producto.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.producto.fields.nombre')</th>
                            <td>{{ $producto->nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.producto.fields.concentracion')</th>
                            <td>{{ $producto->concentracion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.producto.fields.precio-bodega')</th>
                            <td>{{ $producto->precio_bodega }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.producto.fields.laboratorio')</th>
                            <td>{{ $producto->laboratorio->nombre or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.producto.fields.presentacion')</th>
                            <td>{{ $producto->presentacion->nombre or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.producto.fields.modo-uso')</th>
                            <td>{{ $producto->modo_uso->uso or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#facturas" aria-controls="facturas" role="tab" data-toggle="tab">Facturas</a></li>
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
</div>

            <p>&nbsp;</p>

            <a href="{{ route('productos.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop