@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.itemsoc.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['itemsocs.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('folio_id', 'Folio*', ['class' => 'control-label']) !!}
                    {!! Form::select('folio_id', $folios, old('folio_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('folio_id'))
                        <p class="help-block">
                            {{ $errors->first('folio_id') }}
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
                    {!! Form::label('presentancion_id', 'Presentanción', ['class' => 'control-label']) !!}
                    {!! Form::select('presentancion_id', $presentancions, old('presentancion_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('presentancion_id'))
                        <p class="help-block">
                            {{ $errors->first('presentancion_id') }}
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
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('precio_unidad', 'Precio unidad', ['class' => 'control-label']) !!}
                    {!! Form::text('precio_unidad', old('precio_unidad'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('precio_unidad'))
                        <p class="help-block">
                            {{ $errors->first('precio_unidad') }}
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

