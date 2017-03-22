@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.producto.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['productos.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nombre', 'Nombre*', ['class' => 'control-label']) !!}
                    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nombre'))
                        <p class="help-block">
                            {{ $errors->first('nombre') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('concentracion', 'Concentración', ['class' => 'control-label']) !!}
                    {!! Form::text('concentracion', old('concentracion'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('concentracion'))
                        <p class="help-block">
                            {{ $errors->first('concentracion') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('precio_bodega', 'Precio bodega*', ['class' => 'control-label']) !!}
                    {!! Form::text('precio_bodega', old('precio_bodega'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('precio_bodega'))
                        <p class="help-block">
                            {{ $errors->first('precio_bodega') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('laboratorio_id', 'Laboratorio', ['class' => 'control-label']) !!}
                    {!! Form::select('laboratorio_id', $laboratorios, old('laboratorio_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('laboratorio_id'))
                        <p class="help-block">
                            {{ $errors->first('laboratorio_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('presentacion_id', 'Presentación Farmacológica', ['class' => 'control-label']) !!}
                    {!! Form::select('presentacion_id', $presentacions, old('presentacion_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('presentacion_id'))
                        <p class="help-block">
                            {{ $errors->first('presentacion_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('modo_uso_id', 'Modo de Uso', ['class' => 'control-label']) !!}
                    {!! Form::select('modo_uso_id', $modo_usos, old('modo_uso_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('modo_uso_id'))
                        <p class="help-block">
                            {{ $errors->first('modo_uso_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

