@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.comuna.title')</h3>
    @can('comuna_create')
    <p>
        <a href="{{ route('comunas.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($comunas) > 0 ? 'datatable' : '' }} @can('comuna_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('comuna_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.comuna.fields.nombre')</th>
                        <th>@lang('quickadmin.comuna.fields.provincia')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($comunas) > 0)
                        @foreach ($comunas as $comuna)
                            <tr data-entry-id="{{ $comuna->id }}">
                                @can('comuna_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $comuna->nombre }}</td>
                                <td>{{ $comuna->provincia->nombre or '' }}</td>
                                <td>
                                    @can('comuna_view')
                                    <a href="{{ route('comunas.show',[$comuna->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('comuna_edit')
                                    <a href="{{ route('comunas.edit',[$comuna->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('comuna_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['comunas.destroy', $comuna->id])) !!}
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
        @can('comuna_delete')
            window.route_mass_crud_entries_destroy = '{{ route('comunas.mass_destroy') }}';
        @endcan

    </script>
@endsection