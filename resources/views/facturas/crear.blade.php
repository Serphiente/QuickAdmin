@extends('layouts.app')
@php
    $id_cliente = DB::select('select id from clientes where nombre like "' . print_r($json['Listado']['0']['Comprador']['NombreOrganismo'],true) . '"');
@endphp

@section('content')
    <h3 class="page-title">@lang('quickadmin.facturas.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['facturas.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
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
                    {!! Form::select('cliente_id', $clientes, print_r($id_cliente['0']->id,true), ['class' => 'form-control select2']) !!}
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
                    {!! Form::text('orden_compra', print_r($json['Listado']['0']['Codigo'],true), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('orden_compra'))
                        <p class="help-block">
                            {{ $errors->first('orden_compra') }}
                        </p>
                    @endif
                </div>
            </div>
            @php
            $dias_pago = 0;
            if(($json['Listado']['0']['FormaPago']) == 47){
                $dias_pago = 60;
            }elseif(($json['Listado']['0']['FormaPago']) == 46){
                $dias_pago = 50;
            }elseif(($json['Listado']['0']['FormaPago']) == 2){
                $dias_pago = 30;
            }
            elseif(($json['Listado']['0']['FormaPago']) == 1){
                $dias_pago = 15;
            }else{
                $dias_pago = -1;
            }
            @endphp
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('condicion_pago', 'Condición de Pago(días)', ['class' => 'control-label']) !!}
                    {!! Form::number('condicion_pago', $dias_pago, ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::checkbox('estado_pago', 1, false) !!}
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
                    {!! Form::checkbox('documento_valido', 1, true) !!}
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

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@php
echo "<pre>";
    print_r($json['Listado']['0']['FormaPago']);
echo "</pre>";
@endphp



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