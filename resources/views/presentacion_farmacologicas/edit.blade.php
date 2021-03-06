@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.presentacion-farmacologica.title')</h3>
    
    {!! Form::model($presentacion_farmacologica, ['method' => 'PUT', 'route' => ['presentacion_farmacologicas.update', $presentacion_farmacologica->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
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
                    {!! Form::label('nombre_corto', 'Nombre corto*', ['class' => 'control-label']) !!}
                    {!! Form::text('nombre_corto', old('nombre_corto'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nombre_corto'))
                        <p class="help-block">
                            {{ $errors->first('nombre_corto') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

