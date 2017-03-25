@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.recepcionmercaderia.title')</h3>
    @can('recepcionmercaderium_create')
    <p>
        <a href="{{ route('recepcionmercaderias.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($recepcionmercaderias) > 0 ? 'datatable' : '' }} @can('recepcionmercaderium_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('recepcionmercaderium_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                    @if (count($recepcionmercaderias) > 0)
                        @foreach ($recepcionmercaderias as $recepcionmercaderia)
                            <tr data-entry-id="{{ $recepcionmercaderia->id }}">
                                @can('recepcionmercaderium_delete')
                                    <td></td>
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('recepcionmercaderium_delete')
            window.route_mass_crud_entries_destroy = '{{ route('recepcionmercaderias.mass_destroy') }}';
        @endcan

    </script>
@endsection