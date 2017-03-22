@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.proveedor.title')</h3>
    @can('proveedor_create')
    <p>
        <a href="{{ route('proveedors.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($proveedors) > 0 ? 'datatable' : '' }} @can('proveedor_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('proveedor_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.proveedor.fields.nombre')</th>
                        <th>@lang('quickadmin.proveedor.fields.rut')</th>
                        <th>@lang('quickadmin.proveedor.fields.dv')</th>
                        <th>@lang('quickadmin.proveedor.fields.direccion')</th>
                        <th>@lang('quickadmin.proveedor.fields.telefono')</th>
                        <th>@lang('quickadmin.proveedor.fields.email')</th>
                        <th>@lang('quickadmin.proveedor.fields.comuna')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($proveedors) > 0)
                        @foreach ($proveedors as $proveedor)
                            <tr data-entry-id="{{ $proveedor->id }}">
                                @can('proveedor_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->rut }}</td>
                                <td>{{ $proveedor->dv }}</td>
                                <td>{{ $proveedor->direccion }}</td>
                                <td>{{ $proveedor->telefono }}</td>
                                <td>{{ $proveedor->email }}</td>
                                <td>{{ $proveedor->comuna->nombre or '' }}</td>
                                <td>
                                    @can('proveedor_view')
                                    <a href="{{ route('proveedors.show',[$proveedor->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('proveedor_edit')
                                    <a href="{{ route('proveedors.edit',[$proveedor->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('proveedor_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['proveedors.destroy', $proveedor->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('proveedor_delete')
            window.route_mass_crud_entries_destroy = '{{ route('proveedors.mass_destroy') }}';
        @endcan

    </script>
@endsection