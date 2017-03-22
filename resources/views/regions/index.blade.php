@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.region.title')</h3>
    @can('region_create')
    <p>
        <a href="{{ route('regions.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($regions) > 0 ? 'datatable' : '' }} @can('region_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('region_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.region.fields.nombre')</th>
                        <th>@lang('quickadmin.region.fields.ordinal')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($regions) > 0)
                        @foreach ($regions as $region)
                            <tr data-entry-id="{{ $region->id }}">
                                @can('region_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $region->nombre }}</td>
                                <td>{{ $region->ordinal }}</td>
                                <td>
                                    @can('region_view')
                                    <a href="{{ route('regions.show',[$region->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('region_edit')
                                    <a href="{{ route('regions.edit',[$region->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('region_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['regions.destroy', $region->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('region_delete')
            window.route_mass_crud_entries_destroy = '{{ route('regions.mass_destroy') }}';
        @endcan

    </script>
@endsection