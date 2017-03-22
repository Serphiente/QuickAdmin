@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.proveedor.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.proveedor.fields.nombre')</th>
                            <td>{{ $proveedor->nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.proveedor.fields.rut')</th>
                            <td>{{ $proveedor->rut }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.proveedor.fields.dv')</th>
                            <td>{{ $proveedor->dv }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.proveedor.fields.direccion')</th>
                            <td>{{ $proveedor->direccion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.proveedor.fields.telefono')</th>
                            <td>{{ $proveedor->telefono }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.proveedor.fields.email')</th>
                            <td>{{ $proveedor->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.proveedor.fields.comuna')</th>
                            <td>{{ $proveedor->comuna->nombre or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#contactoproveedor" aria-controls="contactoproveedor" role="tab" data-toggle="tab">Contacto proveedor</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="contactoproveedor">
<table class="table table-bordered table-striped {{ count($contacto_proveedors) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

            <p>&nbsp;</p>

            <a href="{{ route('proveedors.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop