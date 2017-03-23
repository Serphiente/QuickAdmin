<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.presentacion-farmacologica.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['presentacion_farmacologicas.store']]); ?>


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
                    <?php echo Form::label('nombre_corto', 'Nombre corto*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('nombre_corto', old('nombre_corto'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('nombre_corto')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('nombre_corto')); ?>

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