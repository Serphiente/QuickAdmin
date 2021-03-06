@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.provincia.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.provincia.fields.nombre')</th>
                            <td>{{ $provincia->nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.provincia.fields.region')</th>
                            <td>{{ $provincia->region->nombre or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#comuna" aria-controls="comuna" role="tab" data-toggle="tab">Comuna</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="comuna">
<table class="table table-bordered table-striped {{ count($comunas) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.comuna.fields.nombre')</th>
                        <th>@lang('quickadmin.comuna.fields.provincia')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($comunas) > 0)
            @foreach ($comunas as $comuna)
                <tr data-entry-id="{{ $comuna->id }}">
                    <td>{{ $comuna->nombre }}</td>
                                <td>{{ $comuna->provincia->nombre or '' }}</td>
                                <td>
                                    @can('comuna_view')
                                    <a href="{{ route('comunas.show',[$comuna->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('comuna_edit')
                                    <a href="{{ route('comunas.edit',[$comuna->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('comuna_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['comunas.destroy', $comuna->id])) !!}
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

            <a href="{{ route('provincias.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop