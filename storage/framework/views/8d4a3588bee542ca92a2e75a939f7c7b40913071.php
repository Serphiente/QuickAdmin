<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.facturas.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('factura_create')): ?>
    <p>
        <a href="<?php echo e(route('facturas.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>
    </p>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped <?php echo e(count($facturas) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('factura_delete')): ?> dt-select <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('factura_delete')): ?>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <?php endif; ?>

                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.folio'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.vendedor'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.fecha'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.cliente'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.facturas.fields.orden-compra'); ?></th>
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
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('factura_delete')): ?>
                                    <td></td>
                                <?php endif; ?>

                                <td><?php echo e($factura->folio); ?></td>
                                <td><?php echo e(isset($factura->vendedor->name) ? $factura->vendedor->name : ''); ?></td>
                                <td><?php echo e($factura->fecha); ?></td>
                                <td><?php echo e(isset($factura->cliente->nombre) ? $factura->cliente->nombre : ''); ?></td>
                                <td><?php echo e($factura->orden_compra); ?></td>
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
                            <td colspan="12"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('factura_delete')): ?>
            window.route_mass_crud_entries_destroy = '<?php echo e(route('facturas.mass_destroy')); ?>';
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>