<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.producto.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['productos.store']]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_create'); ?>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('nombre', 'Nombre*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => '']); ?>

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
                    <?php echo Form::label('concentracion', 'Concentración', ['class' => 'control-label']); ?>

                    <?php echo Form::text('concentracion', old('concentracion'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('concentracion')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('concentracion')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('precio_bodega', 'Precio bodega*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('precio_bodega', old('precio_bodega'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('precio_bodega')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('precio_bodega')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('laboratorio_id', 'Laboratorio', ['class' => 'control-label']); ?>

                    <?php echo Form::select('laboratorio_id', $laboratorios, old('laboratorio_id'), ['class' => 'form-control select2']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('laboratorio_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('laboratorio_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('presentacion_id', 'Presentación Farmacológica', ['class' => 'control-label']); ?>

                    <?php echo Form::select('presentacion_id', $presentacions, old('presentacion_id'), ['class' => 'form-control select2']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('presentacion_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('presentacion_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('unidad_envase', 'Unidad envase', ['class' => 'control-label']); ?>

                    <?php echo Form::number('unidad_envase', old('unidad_envase'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('unidad_envase')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('unidad_envase')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('modo_uso_id', 'Modo de Uso', ['class' => 'control-label']); ?>

                    <?php echo Form::select('modo_uso_id', $modo_usos, old('modo_uso_id'), ['class' => 'form-control select2']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('modo_uso_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('modo_uso_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
    </div>

    <?php echo Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>