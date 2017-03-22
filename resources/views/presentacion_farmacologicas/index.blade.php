@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.presentacion-farmacologica.title')</h3>
    @can('presentacion_farmacologica_create')
    <p>
        <a href="{{ route('presentacion_farmacologicas.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($presentacion_farmacologicas) > 0 ? 'datatable' : '' }} @can('presentacion_farmacologica_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('presentacion_farmacologica_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.presentacion-farmacologica.fields.nombre')</th>
                        <th>@lang('quickadmin.presentacion-farmacologica.fields.nombre-corto')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($presentacion_farmacologicas) > 0)
                        @foreach ($presentacion_farmacologicas as $presentacion_farmacologica)
                            <tr data-entry-id="{{ $presentacion_farmacologica->id }}">
                                @can('presentacion_farmacologica_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $presentacion_farmacologica->nombre }}</td>
                                <td>{{ $presentacion_farmacologica->nombre_corto }}</td>
                                <td>
                                    @can('presentacion_farmacologica_view')
                                    <a href="{{ route('presentacion_farmacologicas.show',[$presentacion_farmacologica->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('presentacion_farmacologica_edit')
                                    <a href="{{ route('presentacion_farmacologicas.edit',[$presentacion_farmacologica->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('presentacion_farmacologica_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['presentacion_farmacologicas.destroy', $presentacion_farmacologica->id])) !!}
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
@stop

@section('javascript') 
    <script>
        @can('presentacion_farmacologica_delete')
            window.route_mass_crud_entries_destroy = '{{ route('presentacion_farmacologicas.mass_destroy') }}';
        @endcan

    </script>
@endsection