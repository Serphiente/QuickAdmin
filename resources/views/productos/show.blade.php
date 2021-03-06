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
                            <th>@lang('quickadmin.producto.fields.unidad-envase')</th>
                            <td>{{ $producto->unidad_envase }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.producto.fields.modo-uso')</th>
                            <td>{{ $producto->modo_uso->uso or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#itemsoc" aria-controls="itemsoc" role="tab" data-toggle="tab">Itemsoc</a></li>
<li role="presentation" class=""><a href="#recepcionmercaderia" aria-controls="recepcionmercaderia" role="tab" data-toggle="tab">Recepcionmercaderia</a></li>
<li role="presentation" class=""><a href="#facturas" aria-controls="facturas" role="tab" data-toggle="tab">Facturas</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="itemsoc">
<table class="table table-bordered table-striped {{ count($itemsocs) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.itemsoc.fields.folio')</th>
                        <th>@lang('quickadmin.itemsoc.fields.producto')</th>
                        <th>@lang('quickadmin.itemsoc.fields.presentancion')</th>
                        <th>@lang('quickadmin.itemsoc.fields.cantidad')</th>
                        <th>@lang('quickadmin.itemsoc.fields.precio-unidad')</th>
                        <th>@lang('quickadmin.itemsoc.fields.observaciones')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($itemsocs) > 0)
            @foreach ($itemsocs as $itemsoc)
                <tr data-entry-id="{{ $itemsoc->id }}">
                    <td>{{ $itemsoc->folio->folio or '' }}</td>
                                <td>{{ $itemsoc->producto->nombre or '' }}</td>
                                <td>{{ $itemsoc->presentancion->nombre or '' }}</td>
                                <td>{{ $itemsoc->cantidad }}</td>
                                <td>{{ $itemsoc->precio_unidad }}</td>
                                <td>{!! $itemsoc->observaciones !!}</td>
                                <td>
                                    @can('itemsoc_view')
                                    <a href="{{ route('itemsocs.show',[$itemsoc->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('itemsoc_edit')
                                    <a href="{{ route('itemsocs.edit',[$itemsoc->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('itemsoc_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['itemsocs.destroy', $itemsoc->id])) !!}
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
<div role="tabpanel" class="tab-pane " id="recepcionmercaderia">
<table class="table table-bordered table-striped {{ count($recepcionmercaderias) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.recepcionmercaderia.fields.proveedor')</th>
                        <th>@lang('quickadmin.recepcionmercaderia.fields.fecha')</th>
                        <th>@lang('quickadmin.recepcionmercaderia.fields.producto')</th>
                        <th>@lang('quickadmin.recepcionmercaderia.fields.lote')</th>
                        <th>@lang('quickadmin.recepcionmercaderia.fields.fecha-vencimiento')</th>
                        <th>@lang('quickadmin.recepcionmercaderia.fields.cantidad')</th>
                        <th>@lang('quickadmin.recepcionmercaderia.fields.precio-compra')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($recepcionmercaderias) > 0)
            @foreach ($recepcionmercaderias as $recepcionmercaderia)
                <tr data-entry-id="{{ $recepcionmercaderia->id }}">
                    <td>{{ $recepcionmercaderia->proveedor->folio or '' }}</td>
                                <td>{{ $recepcionmercaderia->fecha }}</td>
                                <td>{{ $recepcionmercaderia->producto->nombre or '' }}</td>
                                <td>{{ $recepcionmercaderia->lote }}</td>
                                <td>{{ $recepcionmercaderia->fecha_vencimiento }}</td>
                                <td>{{ $recepcionmercaderia->cantidad }}</td>
                                <td>{{ $recepcionmercaderia->precio_compra }}</td>
                                <td>
                                    @can('recepcionmercaderium_view')
                                    <a href="{{ route('recepcionmercaderias.show',[$recepcionmercaderia->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('recepcionmercaderium_edit')
                                    <a href="{{ route('recepcionmercaderias.edit',[$recepcionmercaderia->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('recepcionmercaderium_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['recepcionmercaderias.destroy', $recepcionmercaderia->id])) !!}
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
<div role="tabpanel" class="tab-pane " id="facturas">
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