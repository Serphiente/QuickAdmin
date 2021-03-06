@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.region.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.region.fields.nombre')</th>
                            <td>{{ $region->nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.region.fields.ordinal')</th>
                            <td>{{ $region->ordinal }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#provincia" aria-controls="provincia" role="tab" data-toggle="tab">Provincia</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="provincia">
<table class="table table-bordered table-striped {{ count($provincias) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.provincia.fields.nombre')</th>
                        <th>@lang('quickadmin.provincia.fields.region')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($provincias) > 0)
            @foreach ($provincias as $provincia)
                <tr data-entry-id="{{ $provincia->id }}">
                    <td>{{ $provincia->nombre }}</td>
                                <td>{{ $provincia->region->nombre or '' }}</td>
                                <td>
                                    @can('provincium_view')
                                    <a href="{{ route('provincias.show',[$provincia->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('provincium_edit')
                                    <a href="{{ route('provincias.edit',[$provincia->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('provincium_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['provincias.destroy', $provincia->id])) !!}
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

            <p>&nbsp;</p>

            <a href="{{ route('regions.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop