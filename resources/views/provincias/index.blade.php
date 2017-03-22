@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.provincia.title')</h3>
    @can('provincium_create')
    <p>
        <a href="{{ route('provincias.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($provincias) > 0 ? 'datatable' : '' }} @can('provincium_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('provincium_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.provincia.fields.nombre')</th>
                        <th>@lang('quickadmin.provincia.fields.region')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($provincias) > 0)
                        @foreach ($provincias as $provincia)
                            <tr data-entry-id="{{ $provincia->id }}">
                                @can('provincium_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $provincia->nombre }}</td>
                                <td>{{ $provincia->region->nombre or '' }}</td>
                                <td>
                                    @can('provincium_view')
                                    <a href="{{ route('provincias.show',[$provincia->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('provincium_edit')
                                    <a href="{{ route('provincias.edit',[$provincia->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('provincium_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['provincias.destroy', $provincia->id])) !!}
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
        @can('provincium_delete')
            window.route_mass_crud_entries_destroy = '{{ route('provincias.mass_destroy') }}';
        @endcan

    </script>
@endsection