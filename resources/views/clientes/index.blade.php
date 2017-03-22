@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.cliente.title')</h3>
    @can('cliente_create')
    <p>
        <a href="{{ route('clientes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($clientes) > 0 ? 'datatable' : '' }} @can('cliente_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('cliente_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.cliente.fields.rut')</th>
                        <th>@lang('quickadmin.cliente.fields.dv')</th>
                        <th>@lang('quickadmin.cliente.fields.nombre')</th>
                        <th>@lang('quickadmin.cliente.fields.direccion-factura')</th>
                        <th>@lang('quickadmin.cliente.fields.direccion-despacho')</th>
                        <th>@lang('quickadmin.cliente.fields.comuna')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($clientes) > 0)
                        @foreach ($clientes as $cliente)
                            <tr data-entry-id="{{ $cliente->id }}">
                                @can('cliente_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $cliente->rut }}</td>
                                <td>{{ $cliente->dv }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->direccion_factura }}</td>
                                <td>{{ $cliente->direccion_despacho }}</td>
                                <td>{{ $cliente->comuna->nombre or '' }}</td>
                                <td>
                                    @can('cliente_view')
                                    <a href="{{ route('clientes.show',[$cliente->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('cliente_edit')
                                    <a href="{{ route('clientes.edit',[$cliente->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('cliente_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['clientes.destroy', $cliente->id])) !!}
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
        @can('cliente_delete')
            window.route_mass_crud_entries_destroy = '{{ route('clientes.mass_destroy') }}';
        @endcan

    </script>
@endsection