@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.itemsoc.title')</h3>
    @can('itemsoc_create')
    <p>
        <a href="{{ route('itemsocs.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($itemsocs) > 0 ? 'datatable' : '' }} @can('itemsoc_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('itemsoc_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('itemsoc_delete')
                                    <td></td>
                                @endcan

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
    </div>
@stop

@section('javascript') 
    <script>
        @can('itemsoc_delete')
            window.route_mass_crud_entries_destroy = '{{ route('itemsocs.mass_destroy') }}';
        @endcan

    </script>
@endsection