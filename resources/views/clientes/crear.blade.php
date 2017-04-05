@extends('layouts.app')
@php
$idxs = DB::table('clientes')->pluck('rut');
$codigo = print_r($json['Listado']['0']['Codigo'],true);
$pos = strpos($codigo, "-");
$codigo = substr($codigo, 0, $pos);

$rut = (string)print_r($json['Listado']['0']['Comprador']['RutUnidad'],true);
$dv = $rest = substr($rut, -1);
$rut=substr($rut, 0, -2);
$rut= str_replace(".","",$rut);
$registro_flag = 0;
 foreach($idxs as $idx){
    if($idx == $rut){
       $registro_flag = 1;
    }
}
(string)print_r($json['Listado']['0']['Comprador']['ComunaUnidad'],true);
$id_comuna = DB::table('comunas')->where('nombre', 'like', (string)print_r($json['Listado']['0']['Comprador']['ComunaUnidad'],true))->pluck('id');
$id_comuna = substr($id_comuna,1);
$id_comuna = substr($id_comuna,0,-1);

@endphp
@section('content')
@if($registro_flag == 0)
    <h3 class="page-title">@lang('quickadmin.cliente.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['clientes.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rut', 'Rut*', ['class' => 'control-label']) !!}
                    {!! Form::text('rut', $rut, ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::text('dv', $dv, ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::label('nombre', 'Nombre*', ['class' => 'control-label']) !!}
                    {!! Form::text('nombre', print_r($json['Listado']['0']['Comprador']['NombreOrganismo'],true), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                    {!! Form::label('direccion_factura', 'Dirección factura', ['class' => 'control-label']) !!}
                    {!! Form::text('direccion_factura', print_r($json['Listado']['0']['Comprador']['DireccionUnidad'],true), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('direccion_factura'))
                        <p class="help-block">
                            {{ $errors->first('direccion_factura') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('direccion_despacho', 'Direccion despacho', ['class' => 'control-label']) !!}
                    {!! Form::text('direccion_despacho', print_r($json['Listado']['0']['Comprador']['DireccionUnidad'],true), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('direccion_despacho'))
                        <p class="help-block">
                            {{ $errors->first('direccion_despacho') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('comuna_id', 'Comuna*', ['class' => 'control-label']) !!}

                    {!! Form::select('comuna_id', $comunas, $id_comuna, ['class' => 'form-control select2']) !!}
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

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}


@else
<div class="panel-body">
<div class="row">
                <div class="col-xs-12 form-group">
    <div class="page-title">¡El cliente  
    <br>{{print_r($json['Listado']['0']['Comprador']['NombreOrganismo'],true)}} 
    <br>{{print_r($json['Listado']['0']['Comprador']['RutUnidad'],true)}} 
    <br>{{$rut}}
    <br>{{$idx}}
    <br>ya se encuentra registrado!</div>
    <input type="button" autofocus class="btn btn-primary" value="Volver" id="btn_buscar_oc">

    <script type="text/javascript">
                    document.getElementById("btn_buscar_oc").onclick = function () {
                        location.href = "/clientes/create";
                    };
                </script>
    </div>
    </div>
    </div>
    
@endif

@stop
