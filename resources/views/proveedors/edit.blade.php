@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.proveedor.title')</h3>
    
    {!! Form::model($proveedor, ['method' => 'PUT', 'route' => ['proveedors.update', $proveedor->id]]) !!}

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
                    {!! Form::label('rut', 'Rut*', ['class' => 'control-label']) !!}
                    {!! Form::text('rut', old('rut'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rut'))
                        <p class="help-block">
                            {{ $errors->first('rut') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dv', 'Dígito Verificador*', ['class' => 'control-label']) !!}
                    {!! Form::text('dv', old('dv'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dv'))
                        <p class="help-block">
                            {{ $errors->first('dv') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('direccion', 'Direccion', ['class' => 'control-label']) !!}
                    {!! Form::text('direccion', old('direccion'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('direccion'))
                        <p class="help-block">
                            {{ $errors->first('direccion') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('telefono', 'Teléfono', ['class' => 'control-label']) !!}
                    {!! Form::text('telefono', old('telefono'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('telefono'))
                        <p class="help-block">
                            {{ $errors->first('telefono') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('comuna_id', 'Comuna', ['class' => 'control-label']) !!}
                    {!! Form::select('comuna_id', $comunas, old('comuna_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('comuna_id'))
                        <p class="help-block">
                            {{ $errors->first('comuna_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

