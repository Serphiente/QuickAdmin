@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.password')</th>
                            <td>---</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.rut')</th>
                            <td>{{ $user->rut }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.dv')</th>
                            <td>{{ $user->dv }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.role')</th>
                            <td>{{ $user->role->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.cuenta-banco')</th>
                            <td>{{ $user->cuenta_banco }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.cuenta-tipo')</th>
                            <td>{{ $user->cuenta_tipo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.remember-token')</th>
                            <td>{{ $user->remember_token }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#facturas" aria-controls="facturas" role="tab" data-toggle="tab">Facturas</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="facturas">
<table class="table table-bordered table-striped {{ count($facturas) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.facturas.fields.folio')</th>
                        <th>@lang('quickadmin.facturas.fields.vendedor')</th>
                        <th>@lang('quickadmin.facturas.fields.fecha')</th>
                        <th>@lang('quickadmin.facturas.fields.cliente')</th>
                        <th>@lang('quickadmin.facturas.fields.orden-compra')</th>
                        <th>@lang('quickadmin.facturas.fields.condicion-pago')</th>
                        <th>@lang('quickadmin.facturas.fields.estado-pago')</th>
                        <th>@lang('quickadmin.facturas.fields.documento-valido')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($facturas) > 0)
            @foreach ($facturas as $factura)
                <tr data-entry-id="{{ $factura->id }}">
                    <td>{{ $factura->folio }}</td>
                                <td>{{ $factura->vendedor->name or '' }}</td>
                                <td>{{ $factura->fecha }}</td>
                                <td>{{ $factura->cliente->nombre or '' }}</td>
                                <td>{{ $factura->orden_compra }}</td>
                                <td>{{ $factura->condicion_pago }}</td>
                                <td>{{ Form::checkbox("estado_pago", 1, $factura->estado_pago == 1, ["disabled"]) }}</td>
                                <td>{{ Form::checkbox("documento_valido", 1, $factura->documento_valido == 1, ["disabled"]) }}</td>
                                <td>
                                    @can('factura_view')
                                    <a href="{{ route('facturas.show',[$factura->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('factura_edit')
                                    <a href="{{ route('facturas.edit',[$factura->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('factura_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['facturas.destroy', $factura->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('users.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop