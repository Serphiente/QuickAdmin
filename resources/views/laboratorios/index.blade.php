@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.laboratorio.title')</h3>
    @can('laboratorio_create')
    <p>
        <a href="{{ route('laboratorios.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($laboratorios) > 0 ? 'datatable' : '' }} @can('laboratorio_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('laboratorio_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.laboratorio.fields.nombre')</th>
                        <th>@lang('quickadmin.laboratorio.fields.rut')</th>
                        <th>@lang('quickadmin.laboratorio.fields.dv')</th>
                        <th>@lang('quickadmin.laboratorio.fields.direccion')</th>
                        <th>@lang('quickadmin.laboratorio.fields.ciudad')</th>
                        <th>@lang('quickadmin.laboratorio.fields.telefono')</th>
                        <th>@lang('quickadmin.laboratorio.fields.email')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($laboratorios) > 0)
                        @foreach ($laboratorios as $laboratorio)
                            <tr data-entry-id="{{ $laboratorio->id }}">
                                @can('laboratorio_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $laboratorio->nombre }}</td>
                                <td>{{ $laboratorio->rut }}</td>
                                <td>{{ $laboratorio->dv }}</td>
                                <td>{{ $laboratorio->direccion }}</td>
                                <td>{{ $laboratorio->ciudad->nombre or '' }}</td>
                                <td>{{ $laboratorio->telefono }}</td>
                                <td>{{ $laboratorio->email }}</td>
                                <td>
                                    @can('laboratorio_view')
                                    <a href="{{ route('laboratorios.show',[$laboratorio->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('laboratorio_edit')
                                    <a href="{{ route('laboratorios.edit',[$laboratorio->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('laboratorio_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['laboratorios.destroy', $laboratorio->id])) !!}
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
        @can('laboratorio_delete')
            window.route_mass_crud_entries_destroy = '{{ route('laboratorios.mass_destroy') }}';
        @endcan

    </script>
@endsection