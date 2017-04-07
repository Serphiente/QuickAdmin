@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.facturas.title')</h3>
    @can('factura_create')
    <p>
        <a href="{{ route('facturas.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($facturas) > 0 ? 'datatable' : '' }} @can('factura_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('factura_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.facturas.fields.folio')</th>
                        <th>@lang('quickadmin.facturas.fields.vendedor')</th>
                        <th>@lang('quickadmin.facturas.fields.fecha')</th>
                        <th>@lang('quickadmin.facturas.fields.cliente')</th>
                        <th>@lang('quickadmin.facturas.fields.orden-compra')</th>
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
                                @can('factura_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $factura->folio }}</td>
                                <td>{{ $factura->vendedor->name or '' }}</td>
                                <td>{{ $factura->fecha }}</td>
                                <td>{{ $factura->cliente->nombre or '' }}</td>
                                <td>{{ $factura->orden_compra }}</td>
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
                            <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('factura_delete')
            window.route_mass_crud_entries_destroy = '{{ route('facturas.mass_destroy') }}';
        @endcan

    </script>
@endsection