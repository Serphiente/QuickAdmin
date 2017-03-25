@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.recepcionmercaderia.title')</h3>
    
    {!! Form::model($recepcionmercaderia, ['method' => 'PUT', 'route' => ['recepcionmercaderias.update', $recepcionmercaderia->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('proveedor_id', '# OC', ['class' => 'control-label']) !!}
                    {!! Form::select('proveedor_id', $proveedors, old('proveedor_id'), ['class' => 'form-control select2']) !!}
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
                    {!! Form::label('fecha', 'Fecha', ['class' => 'control-label']) !!}
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
                    {!! Form::label('producto_id', 'Producto', ['class' => 'control-label']) !!}
                    {!! Form::select('producto_id', $productos, old('producto_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('producto_id'))
                        <p class="help-block">
                            {{ $errors->first('producto_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lote', 'Lote', ['class' => 'control-label']) !!}
                    {!! Form::text('lote', old('lote'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lote'))
                        <p class="help-block">
                            {{ $errors->first('lote') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fecha_vencimiento', 'Fecha vencimiento', ['class' => 'control-label']) !!}
                    {!! Form::text('fecha_vencimiento', old('fecha_vencimiento'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fecha_vencimiento'))
                        <p class="help-block">
                            {{ $errors->first('fecha_vencimiento') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cantidad', 'Cantidad', ['class' => 'control-label']) !!}
                    {!! Form::number('cantidad', old('cantidad'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cantidad'))
                        <p class="help-block">
                            {{ $errors->first('cantidad') }}
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