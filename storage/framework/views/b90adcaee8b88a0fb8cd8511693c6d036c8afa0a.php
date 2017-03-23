<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.cliente.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['clientes.store']]); ?>

     <div class="panel-body">
 <div class="row">
            <div class="col-xs-12 form-group">
                <label for="busquedaoc">Búsqueda por OC</label>
                 <input id="input_oc" class="form-control" placeholder="" name="busquedaoc" type="text">
                 <br>
                                
                 <input id="btn_buscar_oc" class="btn btn-primary" type="button" value="Buscar">
                  <script type="text/javascript">
                    document.getElementById("btn_buscar_oc").onclick = function () {
                        location.href = "/clientes/create/"+document.getElementById("input_oc").value;
                    };
                </script>
            </div>
        </div>
        </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_create'); ?>
        </div>
        
        <div class="panel-body">

       

            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('rut', 'Rut*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('rut', old('rut'), ['class' => 'form-control', 'placeholder' => '']); ?>

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

                    <?php echo Form::text('dv', old('dv'), ['class' => 'form-control', 'placeholder' => '']); ?>

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
                    <?php echo Form::label('direccion_factura', 'Dirección factura', ['class' => 'control-label']); ?>

                    <?php echo Form::text('direccion_factura', old('direccion_factura'), ['class' => 'form-control', 'placeholder' => '']); ?>

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

                    <?php echo Form::text('direccion_despacho', old('direccion_despacho'), ['class' => 'form-control', 'placeholder' => '']); ?>

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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>