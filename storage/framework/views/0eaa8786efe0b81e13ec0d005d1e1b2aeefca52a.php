<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.facturas.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['facturas.store']]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_create'); ?>
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('folio', 'Folio*', ['class' => 'control-label']); ?>

                    <?php echo Form::number('folio', old('folio'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('folio')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('folio')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('vendedor_id', 'Vendedor*', ['class' => 'control-label']); ?>

                    <?php echo Form::select('vendedor_id', $vendedors, old('vendedor_id'), ['class' => 'form-control select2']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('vendedor_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('vendedor_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('fecha', 'Fecha*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('fecha', old('fecha'), ['class' => 'form-control date', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('fecha')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('fecha')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('cliente_id', 'Cliente*', ['class' => 'control-label']); ?>

                    <?php echo Form::select('cliente_id', $clientes, old('cliente_id'), ['class' => 'form-control select2']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('cliente_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('cliente_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('orden_compra', 'Orden de Compra', ['class' => 'control-label']); ?>

                    <?php echo Form::text('orden_compra', old('orden_compra'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('orden_compra')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('orden_compra')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('condicion_pago', 'Condición de Pago', ['class' => 'control-label']); ?>

                    <?php echo Form::number('condicion_pago', old('condicion_pago'), ['class' => 'form-control', 'placeholder' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('condicion_pago')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('condicion_pago')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('estado_pago', '¿Pagado?', ['class' => 'control-label']); ?>

                    <?php echo Form::hidden('estado_pago', 0); ?>

                    <?php echo Form::checkbox('estado_pago', 1, false); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('estado_pago')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('estado_pago')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('documento_valido', 'Documento válido', ['class' => 'control-label']); ?>

                    <?php echo Form::hidden('documento_valido', 0); ?>

                    <?php echo Form::checkbox('documento_valido', 1, true); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('documento_valido')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('documento_valido')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
    </div>

    <?php echo Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    ##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "<?php echo e(config('app.date_format_js')); ?>"
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>