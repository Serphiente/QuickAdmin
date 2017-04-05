@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.proveedoroc.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['proveedorocs.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                @php
                $last_id = DB::table('proveedorocs')->max('id');
                @endphp
                    {!! Form::label('folio', 'Orden de Compra #', ['class' => 'control-label']) !!}
                    {!! Form::number('folio', $last_id+1, ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('folio'))
                        <p class="help-block">
                            {{ $errors->first('folio') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('proveedor_id', 'Proveedor*', ['class' => 'control-label']) !!}
                    {!! Form::select('proveedor_id', $proveedors, old('proveedor_id'), ['class' => 'form-control select2 ucfirst']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('proveedor_id'))
                        <p class="help-block">
                            {{ $errors->first('proveedor_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fecha', 'Fecha*', ['class' => 'control-label']) !!}
                    {!! Form::text('fecha', old('fecha'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fecha'))
                        <p class="help-block">
                            {{ $errors->first('fecha') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('observaciones', 'Observaciones', ['class' => 'control-label']) !!}
                    {!! Form::textarea('observaciones', old('observaciones'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('observaciones'))
                        <p class="help-block">
                            {{ $errors->first('observaciones') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
    </script>

@stop