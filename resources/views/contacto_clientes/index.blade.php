@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.contacto-cliente.title')</h3>
    @can('contacto_cliente_create')
    <p>
        <a href="{{ route('contacto_clientes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($contacto_clientes) > 0 ? 'datatable' : '' }} @can('contacto_cliente_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('contacto_cliente_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.contacto-cliente.fields.nombre')</th>
                        <th>@lang('quickadmin.contacto-cliente.fields.apellido')</th>
                        <th>@lang('quickadmin.contacto-cliente.fields.telefono')</th>
                        <th>@lang('quickadmin.contacto-cliente.fields.email')</th>
                        <th>@lang('quickadmin.contacto-cliente.fields.cliente')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($contacto_clientes) > 0)
                        @foreach ($contacto_clientes as $contacto_cliente)
                            <tr data-entry-id="{{ $contacto_cliente->id }}">
                                @can('contacto_cliente_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $contacto_cliente->nombre }}</td>
                                <td>{{ $contacto_cliente->apellido }}</td>
                                <td>{{ $contacto_cliente->telefono }}</td>
                                <td>{{ $contacto_cliente->email }}</td>
                                <td>{{ $contacto_cliente->cliente->nombre or '' }}</td>
                                <td>
                                    @can('contacto_cliente_view')
                                    <a href="{{ route('contacto_clientes.show',[$contacto_cliente->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('contacto_cliente_edit')
                                    <a href="{{ route('contacto_clientes.edit',[$contacto_cliente->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('contacto_cliente_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['contacto_clientes.destroy', $contacto_cliente->id])) !!}
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
        @can('contacto_cliente_delete')
            window.route_mass_crud_entries_destroy = '{{ route('contacto_clientes.mass_destroy') }}';
        @endcan

    </script>
@endsection