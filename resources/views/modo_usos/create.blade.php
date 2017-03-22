@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.modo-uso.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['modo_usos.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('uso', 'Uso*', ['class' => 'control-label']) !!}
                    {!! Form::text('uso', old('uso'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('uso'))
                        <p class="help-block">
                            {{ $errors->first('uso') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

