<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.users.title'); ?></h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.name'); ?></th>
                            <td><?php echo e($user->name); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.email'); ?></th>
                            <td><?php echo e($user->email); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.password'); ?></th>
                            <td>---</td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.rut'); ?></th>
                            <td><?php echo e($user->rut); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.dv'); ?></th>
                            <td><?php echo e($user->dv); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.role'); ?></th>
                            <td><?php echo e(isset($user->role->title) ? $user->role->title : ''); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.cuenta-banco'); ?></th>
                            <td><?php echo e($user->cuenta_banco); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.cuenta-tipo'); ?></th>
                            <td><?php echo e($user->cuenta_tipo); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('quickadmin.users.fields.remember-token'); ?></th>
                            <td><?php echo e($user->remember_token); ?></td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#facturas" aria-controls="facturas" role="tab" data-toggle="tab">Facturas</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="facturas">
<table class="table table-bordered table-striped <?php echo e(count($facturas) > 0 ? 'datatable' : ''); ?>">
    <thead>
        <tr>
            <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.folio'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.vendedor'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.fecha'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.cliente'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.producto'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.cantidad'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.precio'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.condicion-pago'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.estado-pago'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.documento-valido'); ?></th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        <?php if(count($facturas) > 0): ?>
            <?php $__currentLoopData = $facturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $factura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-entry-id="<?php echo e($factura->id); ?>">
                    <td><?php echo e($factura->folio); ?></td>
                                <td><?php echo e(isset($factura->vendedor->name) ? $factura->vendedor->name : ''); ?></td>
                                <td><?php echo e($factura->fecha); ?></td>
                                <td><?php echo e(isset($factura->cliente->nombre) ? $factura->cliente->nombre : ''); ?></td>
                                <td><?php echo e(isset($factura->producto->nombre) ? $factura->producto->nombre : ''); ?></td>
                                <td><?php echo e($factura->cantidad); ?></td>
                                <td><?php echo e($factura->precio); ?></td>
                                <td><?php echo e($factura->condicion_pago); ?></td>
                                <td><?php echo e(Form::checkbox("estado_pago", 1, $factura->estado_pago == 1, ["disabled"])); ?></td>
                                <td><?php echo e(Form::checkbox("documento_valido", 1, $factura->documento_valido == 1, ["disabled"])); ?></td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('factura_view')): ?>
                                    <a href="<?php echo e(route('facturas.show',[$factura->id])); ?>" class="btn btn-xs btn-primary"><?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('factura_edit')): ?>
                                    <a href="<?php echo e(route('facturas.edit',[$factura->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('factura_delete')): ?>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['facturas.destroy', $factura->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="14"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('quickadmin.qa_back_to_list'); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>