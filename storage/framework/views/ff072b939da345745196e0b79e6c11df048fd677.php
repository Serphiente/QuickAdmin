<?php 
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

 ?>
<?php $__env->startSection('content'); ?>
<?php if($registro_flag == 0): ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.cliente.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['clientes.store']]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_create'); ?>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('rut', 'Rut*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('rut', $rut, ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('rut')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('rut')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('dv', 'Dígito Verificador*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('dv', $dv, ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('dv')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('dv')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('nombre', 'Nombre*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('nombre', print_r($json['Listado']['0']['Comprador']['NombreOrganismo'],true), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('nombre')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('nombre')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('direccion_factura', 'Dirección factura', ['class' => 'control-label']); ?>

                    <?php echo Form::text('direccion_factura', print_r($json['Listado']['0']['Comprador']['DireccionUnidad'],true), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('direccion_factura')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('direccion_factura')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('direccion_despacho', 'Direccion despacho', ['class' => 'control-label']); ?>

                    <?php echo Form::text('direccion_despacho', print_r($json['Listado']['0']['Comprador']['DireccionUnidad'],true), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('direccion_despacho')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('direccion_despacho')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('comuna_id', 'Comuna*', ['class' => 'control-label']); ?>

                    <?php echo Form::select('comuna_id', $comunas, old('comuna_id'), ['class' => 'form-control select2']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('comuna_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('comuna_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
    </div>

    <?php echo Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']); ?>

    <?php echo Form::close(); ?>



<?php else: ?>
<div class="panel-body">
<div class="row">
                <div class="col-xs-12 form-group">
    <div class="page-title">¡El cliente  
    <br><?php echo e(print_r($json['Listado']['0']['Comprador']['NombreOrganismo'],true)); ?> 
    <br><?php echo e(print_r($json['Listado']['0']['Comprador']['RutUnidad'],true)); ?> 
    <br><?php echo e($rut); ?>

    <br><?php echo e($idx); ?>

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
    
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>