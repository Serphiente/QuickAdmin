@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.modo-uso.title')</h3>
    @can('modo_uso_create')
    <p>
        <a href="{{ route('modo_usos.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($modo_usos) > 0 ? 'datatable' : '' }} @can('modo_uso_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('modo_uso_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.modo-uso.fields.uso')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($modo_usos) > 0)
                        @foreach ($modo_usos as $modo_uso)
                            <tr data-entry-id="{{ $modo_uso->id }}">
                                @can('modo_uso_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $modo_uso->uso }}</td>
                                <td>
                                    @can('modo_uso_view')
                                    <a href="{{ route('modo_usos.show',[$modo_uso->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('modo_uso_edit')
                                    <a href="{{ route('modo_usos.edit',[$modo_uso->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('modo_uso_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['modo_usos.destroy', $modo_uso->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('modo_uso_delete')
            window.route_mass_crud_entries_destroy = '{{ route('modo_usos.mass_destroy') }}';
        @endcan

    </script>
@endsection