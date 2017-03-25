@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.itemsoc.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.itemsoc.fields.folio')</th>
                            <td>{{ $itemsoc->folio->folio or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.itemsoc.fields.producto')</th>
                            <td>{{ $itemsoc->producto->nombre or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.itemsoc.fields.presentancion')</th>
                            <td>{{ $itemsoc->presentancion->nombre or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.itemsoc.fields.cantidad')</th>
                            <td>{{ $itemsoc->cantidad }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.itemsoc.fields.precio-unidad')</th>
                            <td>{{ $itemsoc->precio_unidad }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.itemsoc.fields.observaciones')</th>
                            <td>{!! $itemsoc->observaciones !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('itemsocs.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop