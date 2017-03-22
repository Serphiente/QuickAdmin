@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.contacto-proveedor.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.contacto-proveedor.fields.nombre')</th>
                            <td>{{ $contacto_proveedor->nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacto-proveedor.fields.apellido')</th>
                            <td>{{ $contacto_proveedor->apellido }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacto-proveedor.fields.telefono')</th>
                            <td>{{ $contacto_proveedor->telefono }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacto-proveedor.fields.email')</th>
                            <td>{{ $contacto_proveedor->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contacto-proveedor.fields.proveedor')</th>
                            <td>{{ $contacto_proveedor->proveedor->nombre or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('contacto_proveedors.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop