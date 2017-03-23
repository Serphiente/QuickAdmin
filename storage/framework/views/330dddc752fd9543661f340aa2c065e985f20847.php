<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.proveedor.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedor_create')): ?>
    <p>
        <a href="<?php echo e(route('proveedors.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>
    </p>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped <?php echo e(count($proveedors) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedor_delete')): ?> dt-select <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedor_delete')): ?>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <?php endif; ?>

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
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedor_delete')): ?>
                                    <td></td>
                                <?php endif; ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedor_delete')): ?>
            window.route_mass_crud_entries_destroy = '<?php echo e(route('proveedors.mass_destroy')); ?>';
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>