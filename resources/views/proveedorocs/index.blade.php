@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.proveedoroc.title')</h3>
    @can('proveedoroc_create')
    <p>
        <a href="{{ route('proveedorocs.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($proveedorocs) > 0 ? 'datatable' : '' }} @can('proveedoroc_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('proveedoroc_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.proveedoroc.fields.folio')</th>
                        <th>@lang('quickadmin.proveedoroc.fields.proveedor')</th>
                        <th>@lang('quickadmin.proveedoroc.fields.fecha')</th>
                        <th>@lang('quickadmin.proveedoroc.fields.observaciones')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($proveedorocs) > 0)
                        @foreach ($proveedorocs as $proveedoroc)
                            <tr data-entry-id="{{ $proveedoroc->id }}">
                                @can('proveedoroc_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $proveedoroc->folio }}</td>
                                <td>{{ $proveedoroc->proveedor->nombre or '' }}</td>
                                <td>{{ $proveedoroc->fecha }}</td>
                                <td>{!! $proveedoroc->observaciones !!}</td>
                                <td>
                                    @can('proveedoroc_view')
                                    <a href="{{ route('proveedorocs.show',[$proveedoroc->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('proveedoroc_edit')
                                    <a href="{{ route('proveedorocs.edit',[$proveedoroc->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('proveedoroc_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['proveedorocs.destroy', $proveedoroc->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('proveedoroc_delete')
            window.route_mass_crud_entries_destroy = '{{ route('proveedorocs.mass_destroy') }}';
        @endcan

    </script>
@endsection