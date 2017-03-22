@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.contacto-proveedor.title')</h3>
    @can('contacto_proveedor_create')
    <p>
        <a href="{{ route('contacto_proveedors.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($contacto_proveedors) > 0 ? 'datatable' : '' }} @can('contacto_proveedor_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('contacto_proveedor_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.contacto-proveedor.fields.nombre')</th>
                        <th>@lang('quickadmin.contacto-proveedor.fields.apellido')</th>
                        <th>@lang('quickadmin.contacto-proveedor.fields.telefono')</th>
                        <th>@lang('quickadmin.contacto-proveedor.fields.email')</th>
                        <th>@lang('quickadmin.contacto-proveedor.fields.proveedor')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($contacto_proveedors) > 0)
                        @foreach ($contacto_proveedors as $contacto_proveedor)
                            <tr data-entry-id="{{ $contacto_proveedor->id }}">
                                @can('contacto_proveedor_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $contacto_proveedor->nombre }}</td>
                                <td>{{ $contacto_proveedor->apellido }}</td>
                                <td>{{ $contacto_proveedor->telefono }}</td>
                                <td>{{ $contacto_proveedor->email }}</td>
                                <td>{{ $contacto_proveedor->proveedor->nombre or '' }}</td>
                                <td>
                                    @can('contacto_proveedor_view')
                                    <a href="{{ route('contacto_proveedors.show',[$contacto_proveedor->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('contacto_proveedor_edit')
                                    <a href="{{ route('contacto_proveedors.edit',[$contacto_proveedor->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('contacto_proveedor_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['contacto_proveedors.destroy', $contacto_proveedor->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('contacto_proveedor_delete')
            window.route_mass_crud_entries_destroy = '{{ route('contacto_proveedors.mass_destroy') }}';
        @endcan

    </script>
@endsection