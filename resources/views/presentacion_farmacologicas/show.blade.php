@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.presentacion-farmacologica.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.presentacion-farmacologica.fields.nombre')</th>
                            <td>{{ $presentacion_farmacologica->nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.presentacion-farmacologica.fields.nombre-corto')</th>
                            <td>{{ $presentacion_farmacologica->nombre_corto }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#itemsoc" aria-controls="itemsoc" role="tab" data-toggle="tab">Itemsoc</a></li>
<li role="presentation" class=""><a href="#producto" aria-controls="producto" role="tab" data-toggle="tab">Producto</a></li>
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
<div role="tabpanel" class="tab-pane " id="producto">
<table class="table table-bordered table-striped {{ count($productos) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.producto.fields.nombre')</th>
                        <th>@lang('quickadmin.producto.fields.concentracion')</th>
                        <th>@lang('quickadmin.producto.fields.precio-bodega')</th>
                        <th>@lang('quickadmin.producto.fields.laboratorio')</th>
                        <th>@lang('quickadmin.producto.fields.presentacion')</th>
                        <th>@lang('quickadmin.producto.fields.unidad-envase')</th>
                        <th>@lang('quickadmin.producto.fields.modo-uso')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($productos) > 0)
            @foreach ($productos as $producto)
                <tr data-entry-id="{{ $producto->id }}">
                    <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->concentracion }}</td>
                                <td>{{ $producto->precio_bodega }}</td>
                                <td>{{ $producto->laboratorio->nombre or '' }}</td>
                                <td>{{ $producto->presentacion->nombre or '' }}</td>
                                <td>{{ $producto->unidad_envase }}</td>
                                <td>{{ $producto->modo_uso->uso or '' }}</td>
                                <td>
                                    @can('producto_view')
                                    <a href="{{ route('productos.show',[$producto->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('producto_edit')
                                    <a href="{{ route('productos.edit',[$producto->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('producto_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['productos.destroy', $producto->id])) !!}
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

            <a href="{{ route('presentacion_farmacologicas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop