<?php $request = app('Illuminate\Http\Request'); ?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('/')); ?>">
                    <i class="fa fa-wrench"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.qa_dashboard'); ?></span>
                </a>
            </li>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('factura_access')): ?>
            <li class="<?php echo e($request->segment(1) == 'facturas' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('facturas.index')); ?>">
                    <i class="fa fa-gears"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.facturas.title'); ?></span>
                </a>
            </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('administración_general_access')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.administracion-general.title'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cliente_access')): ?>
                <li class="<?php echo e($request->segment(1) == 'clientes' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('clientes.index')); ?>">
                            <i class="fa fa-star-o"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.cliente.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacto_cliente_access')): ?>
                <li class="<?php echo e($request->segment(1) == 'contacto_clientes' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('contacto_clientes.index')); ?>">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.contacto-cliente.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proveedor_access')): ?>
                <li class="<?php echo e($request->segment(1) == 'proveedors' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('proveedors.index')); ?>">
                            <i class="fa fa-chevron-circle-right"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.proveedor.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contacto_proveedor_access')): ?>
                <li class="<?php echo e($request->segment(1) == 'contacto_proveedors' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('contacto_proveedors.index')); ?>">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.contacto-proveedor.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('laboratorio_access')): ?>
                <li class="<?php echo e($request->segment(1) == 'laboratorios' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('laboratorios.index')); ?>">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.laboratorio.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.user-management.title'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                <li class="<?php echo e($request->segment(1) == 'users' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('users.index')); ?>">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.users.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                <li class="<?php echo e($request->segment(1) == 'roles' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('roles.index')); ?>">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.roles.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('regiones,_provincias_y_comuna_access')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.regiones-provincias-y-comunas.title'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comuna_access')): ?>
                <li class="<?php echo e($request->segment(1) == 'comunas' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('comunas.index')); ?>">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.comuna.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('region_access')): ?>
                <li class="<?php echo e($request->segment(1) == 'regions' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('regions.index')); ?>">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.region.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('provincium_access')): ?>
                <li class="<?php echo e($request->segment(1) == 'provincias' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('provincias.index')); ?>">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.provincia.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('medicamento_access')): ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-heartbeat"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.medicamentos.title'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('modo_uso_access')): ?>
                <li class="<?php echo e($request->segment(1) == 'modo_usos' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('modo_usos.index')); ?>">
                            <i class="fa fa-quote-right"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.modo-uso.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('presentacion_farmacologica_access')): ?>
                <li class="<?php echo e($request->segment(1) == 'presentacion_farmacologicas' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('presentacion_farmacologicas.index')); ?>">
                            <i class="fa fa-heartbeat"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.presentacion-farmacologica.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto_access')): ?>
                <li class="<?php echo e($request->segment(1) == 'productos' ? 'active active-sub' : ''); ?>">
                        <a href="<?php echo e(route('productos.index')); ?>">
                            <i class="fa fa-heartbeat"></i>
                            <span class="title">
                                <?php echo app('translator')->getFromJson('quickadmin.producto.title'); ?>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>

            

            <li class="<?php echo e($request->segment(1) == 'change_password' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('auth.change_password')); ?>">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.qa_logout'); ?></span>
                </a>
            </li>
        </ul>
    </section>
</aside>
<?php echo Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']); ?>

<button type="submit"><?php echo app('translator')->getFromJson('quickadmin.logout'); ?></button>
<?php echo Form::close(); ?>

