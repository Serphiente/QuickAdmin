<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->getFromJson('quickadmin.producto.title'); ?></h3>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto_create')): ?>
    <p>
        <a href="<?php echo e(route('productos.create')); ?>" class="btn btn-success"><?php echo app('translator')->getFromJson('quickadmin.qa_add_new'); ?></a>
    </p>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->getFromJson('quickadmin.qa_list'); ?>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped <?php echo e(count($productos) > 0 ? 'datatable' : ''); ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto_delete')): ?> dt-select <?php endif; ?>">
                <thead>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto_delete')): ?>
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <?php endif; ?>

                        <th><?php echo app('translator')->getFromJson('quickadmin.producto.fields.nombre'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.producto.fields.concentracion'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.producto.fields.precio-bodega'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.producto.fields.laboratorio'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.producto.fields.presentacion'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.producto.fields.unidad-envase'); ?></th>
                        <th><?php echo app('translator')->getFromJson('quickadmin.producto.fields.modo-uso'); ?></th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php if(count($productos) > 0): ?>
                        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($producto->id); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto_delete')): ?>
                                    <td></td>
                                <?php endif; ?>

                                <td><?php echo e($producto->nombre); ?></td>
                                <td><?php echo e($producto->concentracion); ?></td>
                                <td><?php echo e($producto->precio_bodega); ?></td>
                                <td><?php echo e(isset($producto->laboratorio->nombre) ? $producto->laboratorio->nombre : ''); ?></td>
                                <td><?php echo e(isset($producto->presentacion->nombre) ? $producto->presentacion->nombre : ''); ?></td>
                                <td><?php echo e($producto->unidad_envase); ?></td>
                                <td><?php echo e(isset($producto->modo_uso->uso) ? $producto->modo_uso->uso : ''); ?></td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto_view')): ?>
                                    <a href="<?php echo e(route('productos.show',[$producto->id])); ?>" class="btn btn-xs btn-primary"><?php echo app('translator')->getFromJson('quickadmin.qa_view'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto_edit')): ?>
                                    <a href="<?php echo e(route('productos.edit',[$producto->id])); ?>" class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('quickadmin.qa_edit'); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto_delete')): ?>
                                    <?php echo Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['productos.destroy', $producto->id])); ?>

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
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto_delete')): ?>
            window.route_mass_crud_entries_destroy = '<?php echo e(route('productos.mass_destroy')); ?>';
        <?php endif; ?>

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>