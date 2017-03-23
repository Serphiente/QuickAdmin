<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.contacto-cliente.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacto_cliente_create')): ?>
    <p>
        <a href="<?php echo e(route('contacto_clientes.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>
    </p>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped <?php echo e(count($contacto_clientes) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacto_cliente_delete')): ?> dt-select <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacto_cliente_delete')): ?>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <?php endif; ?>

                        <th><?php echo app('translator')->getFromJson('quickadmin.contacto-cliente.fields.nombre'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.contacto-cliente.fields.apellido'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.contacto-cliente.fields.telefono'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.contacto-cliente.fields.email'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.contacto-cliente.fields.cliente'); ?></th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php if(count($contacto_clientes) > 0): ?>
                        <?php $__currentLoopData = $contacto_clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto_cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($contacto_cliente->id); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacto_cliente_delete')): ?>
                                    <td></td>
                                <?php endif; ?>

                                <td><?php echo e($contacto_cliente->nombre); ?></td>
                                <td><?php echo e($contacto_cliente->apellido); ?></td>
                                <td><?php echo e($contacto_cliente->telefono); ?></td>
                                <td><?php echo e($contacto_cliente->email); ?></td>
                                <td><?php echo e(isset($contacto_cliente->cliente->nombre) ? $contacto_cliente->cliente->nombre : ''); ?></td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacto_cliente_view')): ?>
                                    <a href="<?php echo e(route('contacto_clientes.show',[$contacto_cliente->id])); ?>" class="btn btn-xs btn-primary"><?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacto_cliente_edit')): ?>
                                    <a href="<?php echo e(route('contacto_clientes.edit',[$contacto_cliente->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacto_cliente_delete')): ?>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['contacto_clientes.destroy', $contacto_cliente->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacto_cliente_delete')): ?>
            window.route_mass_crud_entries_destroy = '<?php echo e(route('contacto_clientes.mass_destroy')); ?>';
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>