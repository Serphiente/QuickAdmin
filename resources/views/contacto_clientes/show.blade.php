@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.contacto-cliente.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.contacto-cliente.fields.nombre')</th>
                            <td>{{ $contacto_cliente->nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacto-cliente.fields.apellido')</th>
                            <td>{{ $contacto_cliente->apellido }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacto-cliente.fields.telefono')</th>
                            <td>{{ $contacto_cliente->telefono }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacto-cliente.fields.email')</th>
                            <td>{{ $contacto_cliente->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacto-cliente.fields.cliente')</th>
                            <td>{{ $contacto_cliente->cliente->nombre or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('contacto_clientes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop