<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.comuna.title'); ?></h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.comuna.fields.nombre'); ?></th>
                            <td><?php echo e($comuna->nombre); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.comuna.fields.provincia'); ?></th>
                            <td><?php echo e(isset($comuna->provincia->nombre) ? $comuna->provincia->nombre : ''); ?></td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#laboratorio" aria-controls="laboratorio" role="tab" data-toggle="tab">Laboratorio</a></li>
<li role="presentation" class=""><a href="#cliente" aria-controls="cliente" role="tab" data-toggle="tab">Cliente</a></li>
<li role="presentation" class=""><a href="#proveedor" aria-controls="proveedor" role="tab" data-toggle="tab">Proveedor</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="laboratorio">
<table class="table table-bordered table-striped <?php echo e(count($laboratorios) > 0 ? 'datatable' : ''); ?>">
    <thead>
        <tr>
            <th><?php echo app('translator')->getFromJson('quickadmin.laboratorio.fields.nombre'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.laboratorio.fields.rut'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.laboratorio.fields.dv'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.laboratorio.fields.direccion'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.laboratorio.fields.ciudad'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.laboratorio.fields.telefono'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.laboratorio.fields.email'); ?></th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        <?php if(count($laboratorios) > 0): ?>
            <?php $__currentLoopData = $laboratorios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $laboratorio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-entry-id="<?php echo e($laboratorio->id); ?>">
                    <td><?php echo e($laboratorio->nombre); ?></td>
                                <td><?php echo e($laboratorio->rut); ?></td>
                                <td><?php echo e($laboratorio->dv); ?></td>
                                <td><?php echo e($laboratorio->direccion); ?></td>
                                <td><?php echo e(isset($laboratorio->ciudad->nombre) ? $laboratorio->ciudad->nombre : ''); ?></td>
                                <td><?php echo e($laboratorio->telefono); ?></td>
                                <td><?php echo e($laboratorio->email); ?></td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('laboratorio_view')): ?>
                                    <a href="<?php echo e(route('laboratorios.show',[$laboratorio->id])); ?>" class="btn btn-xs btn-primary"><?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('laboratorio_edit')): ?>
                                    <a href="<?php echo e(route('laboratorios.edit',[$laboratorio->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('laboratorio_delete')): ?>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['laboratorios.destroy', $laboratorio->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="11"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="cliente">
<table class="table table-bordered table-striped <?php echo e(count($clientes) > 0 ? 'datatable' : ''); ?>">
    <thead>
        <tr>
            <th><?php echo app('translator')->getFromJson('quickadmin.cliente.fields.rut'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.cliente.fields.dv'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.cliente.fields.nombre'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.cliente.fields.direccion-factura'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.cliente.fields.direccion-despacho'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.cliente.fields.comuna'); ?></th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        <?php if(count($clientes) > 0): ?>
            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-entry-id="<?php echo e($cliente->id); ?>">
                    <td><?php echo e($cliente->rut); ?></td>
                                <td><?php echo e($cliente->dv); ?></td>
                                <td><?php echo e($cliente->nombre); ?></td>
                                <td><?php echo e($cliente->direccion_factura); ?></td>
                                <td><?php echo e($cliente->direccion_despacho); ?></td>
                                <td><?php echo e(isset($cliente->comuna->nombre) ? $cliente->comuna->nombre : ''); ?></td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cliente_view')): ?>
                                    <a href="<?php echo e(route('clientes.show',[$cliente->id])); ?>" class="btn btn-xs btn-primary"><?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cliente_edit')): ?>
                                    <a href="<?php echo e(route('clientes.edit',[$cliente->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cliente_delete')): ?>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['clientes.destroy', $cliente->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="10"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="proveedor">
<table class="table table-bordered table-striped <?php echo e(count($proveedors) > 0 ? 'datatable' : ''); ?>">
    <thead>
        <tr>
            <th><?php echo app('translator')->getFromJson('quickadmin.proveedor.fields.nombre'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.proveedor.fields.rut'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.proveedor.fields.dv'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.proveedor.fields.direccion'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.proveedor.fields.telefono'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.proveedor.fields.email'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.proveedor.fields.comuna'); ?></th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        <?php if(count($proveedors) > 0): ?>
            <?php $__currentLoopData = $proveedors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-entry-id="<?php echo e($proveedor->id); ?>">
                    <td><?php echo e($proveedor->nombre); ?></td>
                                <td><?php echo e($proveedor->rut); ?></td>
                                <td><?php echo e($proveedor->dv); ?></td>
                                <td><?php echo e($proveedor->direccion); ?></td>
                                <td><?php echo e($proveedor->telefono); ?></td>
                                <td><?php echo e($proveedor->email); ?></td>
                                <td><?php echo e(isset($proveedor->comuna->nombre) ? $proveedor->comuna->nombre : ''); ?></td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedor_view')): ?>
                                    <a href="<?php echo e(route('proveedors.show',[$proveedor->id])); ?>" class="btn btn-xs btn-primary"><?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedor_edit')): ?>
                                    <a href="<?php echo e(route('proveedors.edit',[$proveedor->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedor_delete')): ?>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['proveedors.destroy', $proveedor->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="11"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="<?php echo e(route('comunas.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('quickadmin.qa_back_to_list'); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>