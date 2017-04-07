@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.facturas.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.facturas.fields.folio')</th>
                            <td>{{ $factura->folio }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.facturas.fields.vendedor')</th>
                            <td>{{ $factura->vendedor->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.facturas.fields.fecha')</th>
                            <td>{{ $factura->fecha }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.facturas.fields.cliente')</th>
                            <td>{{ $factura->cliente->nombre or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.facturas.fields.orden-compra')</th>
                            <td>{{ $factura->orden_compra }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.facturas.fields.condicion-pago')</th>
                            <td>{{ $factura->condicion_pago }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.facturas.fields.estado-pago')</th>
                            <td>{{ Form::checkbox("estado_pago", 1, $factura->estado_pago == 1, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.facturas.fields.documento-valido')</th>
                            <td>{{ Form::checkbox("documento_valido", 1, $factura->documento_valido == 1, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('facturas.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop