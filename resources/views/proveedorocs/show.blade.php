@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.proveedoroc.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.proveedoroc.fields.folio')</th>
                            <td>{{ $proveedoroc->folio }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.proveedoroc.fields.proveedor')</th>
                            <td>{{ $proveedoroc->proveedor->nombre or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.proveedoroc.fields.fecha')</th>
                            <td>{{ $proveedoroc->fecha }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.proveedoroc.fields.observaciones')</th>
                            <td>{!! $proveedoroc->observaciones !!}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#itemsoc" aria-controls="itemsoc" role="tab" data-toggle="tab">Items</a></li>
<li role="presentation" class=""><a href="#recepcionmercaderia" aria-controls="recepcionmercaderia" role="tab" data-toggle="tab">Recepción Mercadería</a></li>
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
            <br>
            <a href="{{ route('itemsocs.create') }}/{{ $proveedoroc->folio }}"><button class="btn btn-primary">Agregar Item</button> </a>
            <br><br>
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
            
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="recepcionmercaderia">
<table class="table table-bordered table-striped {{ count($recepcionmercaderia) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.recepcionmercaderia.fields.proveedor')</th>
                        <th>@lang('quickadmin.recepcionmercaderia.fields.fecha')</th>
                        <th>@lang('quickadmin.recepcionmercaderia.fields.producto')</th>
                        <th>@lang('quickadmin.recepcionmercaderia.fields.lote')</th>
                        <th>@lang('quickadmin.recepcionmercaderia.fields.fecha-vencimiento')</th>
                        <th>@lang('quickadmin.recepcionmercaderia.fields.cantidad')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($recepcionmercaderia) > 0)
            @foreach ($recepcionmercaderia as $recepcionmercaderia)
                <tr data-entry-id="{{ $recepcionmercaderia->id }}">
                    <td>{{ $recepcionmercaderia->proveedor->folio or '' }}</td>
                                <td>{{ $recepcionmercaderia->fecha }}</td>
                                <td>{{ $recepcionmercaderia->producto->nombre or '' }}</td>
                                <td>{{ $recepcionmercaderia->lote }}</td>
                                <td>{{ $recepcionmercaderia->fecha_vencimiento }}</td>
                                <td>{{ $recepcionmercaderia->cantidad }}</td>
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
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('proveedorocs.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop