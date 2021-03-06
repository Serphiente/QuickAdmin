@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.facturas.title')</h3>
    
    {!! Form::model($factura, ['method' => 'PUT', 'route' => ['facturas.update', $factura->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('folio', 'Folio*', ['class' => 'control-label']) !!}
                    {!! Form::number('folio', old('folio'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::label('vendedor_id', 'Vendedor*', ['class' => 'control-label']) !!}
                    {!! Form::select('vendedor_id', $vendedors, old('vendedor_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('vendedor_id'))
                        <p class="help-block">
                            {{ $errors->first('vendedor_id') }}
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
                    {!! Form::label('cliente_id', 'Cliente*', ['class' => 'control-label']) !!}
                    {!! Form::select('cliente_id', $clientes, old('cliente_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cliente_id'))
                        <p class="help-block">
                            {{ $errors->first('cliente_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('orden_compra', 'Orden de Compra', ['class' => 'control-label']) !!}
                    {!! Form::text('orden_compra', old('orden_compra'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('orden_compra'))
                        <p class="help-block">
                            {{ $errors->first('orden_compra') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('condicion_pago', 'Condición de Pago', ['class' => 'control-label']) !!}
                    {!! Form::number('condicion_pago', old('condicion_pago'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('condicion_pago'))
                        <p class="help-block">
                            {{ $errors->first('condicion_pago') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('estado_pago', '¿Pagado?', ['class' => 'control-label']) !!}
                    {!! Form::hidden('estado_pago', 0) !!}
                    {!! Form::checkbox('estado_pago', 1, old('estado_pago')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('estado_pago'))
                        <p class="help-block">
                            {{ $errors->first('estado_pago') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('documento_valido', 'Documento válido', ['class' => 'control-label']) !!}
                    {!! Form::hidden('documento_valido', 0) !!}
                    {!! Form::checkbox('documento_valido', 1, old('documento_valido')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('documento_valido'))
                        <p class="help-block">
                            {{ $errors->first('documento_valido') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
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