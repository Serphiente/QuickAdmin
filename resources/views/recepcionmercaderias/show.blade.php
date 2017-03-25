@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.recepcionmercaderia.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.recepcionmercaderia.fields.proveedor')</th>
                            <td>{{ $recepcionmercaderia->proveedor->folio or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.recepcionmercaderia.fields.fecha')</th>
                            <td>{{ $recepcionmercaderia->fecha }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.recepcionmercaderia.fields.producto')</th>
                            <td>{{ $recepcionmercaderia->producto->nombre or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.recepcionmercaderia.fields.lote')</th>
                            <td>{{ $recepcionmercaderia->lote }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.recepcionmercaderia.fields.fecha-vencimiento')</th>
                            <td>{{ $recepcionmercaderia->fecha_vencimiento }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.recepcionmercaderia.fields.cantidad')</th>
                            <td>{{ $recepcionmercaderia->cantidad }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('recepcionmercaderias.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop