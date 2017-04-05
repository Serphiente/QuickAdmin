<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.comuna.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comuna_create')): ?>
    <p>
        <a href="<?php echo e(route('comunas.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>
    </p>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped <?php echo e(count($comunas) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comuna_delete')): ?> dt-select <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comuna_delete')): ?>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <?php endif; ?>

                        <th><?php echo app('translator')->getFromJson('quickadmin.comuna.fields.nombre'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.comuna.fields.provincia'); ?></th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php if(count($comunas) > 0): ?>
                        <?php $__currentLoopData = $comunas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comuna): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($comuna->id); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comuna_delete')): ?>
                                    <td></td>
                                <?php endif; ?>

                                <td><?php echo e($comuna->nombre); ?></td>
                                <td><?php echo e(isset($comuna->provincia->nombre) ? $comuna->provincia->nombre : ''); ?></td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comuna_view')): ?>
                                    <a href="<?php echo e(route('comunas.show',[$comuna->id])); ?>" class="btn btn-xs btn-primary"><?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comuna_edit')): ?>
                                    <a href="<?php echo e(route('comunas.edit',[$comuna->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comuna_delete')): ?>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['comunas.destroy', $comuna->id])); ?>

                                    <?php echo Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')); ?>

                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6"><?php echo app('translator')->getFromJson('quickadmin.qa_no_entries_in_table'); ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?> 
    <script>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comuna_delete')): ?>
            window.route_mass_crud_entries_destroy = '<?php echo e(route('comunas.mass_destroy')); ?>';
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>