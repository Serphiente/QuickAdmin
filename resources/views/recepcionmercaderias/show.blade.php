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
                            <td>{{ $recepcionmercaderium->proveedor->folio or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.recepcionmercaderia.fields.fecha')</th>
                            <td>{{ $recepcionmercaderium->fecha }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.recepcionmercaderia.fields.producto')</th>
                            <td>{{ $recepcionmercaderium->producto->nombre or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.recepcionmercaderia.fields.lote')</th>
                            <td>{{ $recepcionmercaderium->lote }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.recepcionmercaderia.fields.fecha-vencimiento')</th>
                            <td>{{ $recepcionmercaderium->fecha_vencimiento }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.recepcionmercaderia.fields.cantidad')</th>
                            <td>{{ $recepcionmercaderium->cantidad }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('recepcionmercaderias.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop