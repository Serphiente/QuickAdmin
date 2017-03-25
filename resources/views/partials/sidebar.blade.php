@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            
            @can('factura_access')
            <li class="{{ $request->segment(1) == 'facturas' ? 'active' : '' }}">
                <a href="{{ route('facturas.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.facturas.title')</span>
                </a>
            </li>
            @endcan
            
            @can('administración_general_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.administracion-general.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('cliente_access')
                <li class="{{ $request->segment(1) == 'clientes' ? 'active active-sub' : '' }}">
                        <a href="{{ route('clientes.index') }}">
                            <i class="fa fa-star-o"></i>
                            <span class="title">
                                @lang('quickadmin.cliente.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('contacto_cliente_access')
                <li class="{{ $request->segment(1) == 'contacto_clientes' ? 'active active-sub' : '' }}">
                        <a href="{{ route('contacto_clientes.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.contacto-cliente.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('proveedor_access')
                <li class="{{ $request->segment(1) == 'proveedors' ? 'active active-sub' : '' }}">
                        <a href="{{ route('proveedors.index') }}">
                            <i class="fa fa-chevron-circle-right"></i>
                            <span class="title">
                                @lang('quickadmin.proveedor.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('contacto_proveedor_access')
                <li class="{{ $request->segment(1) == 'contacto_proveedors' ? 'active active-sub' : '' }}">
                        <a href="{{ route('contacto_proveedors.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.contacto-proveedor.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('laboratorio_access')
                <li class="{{ $request->segment(1) == 'laboratorios' ? 'active active-sub' : '' }}">
                        <a href="{{ route('laboratorios.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.laboratorio.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('user_access')
                <li class="{{ $request->segment(1) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('role_access')
                <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('regiones,_provincias_y_comuna_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span class="title">@lang('quickadmin.regiones-provincias-y-comunas.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('comuna_access')
                <li class="{{ $request->segment(1) == 'comunas' ? 'active active-sub' : '' }}">
                        <a href="{{ route('comunas.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.comuna.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('region_access')
                <li class="{{ $request->segment(1) == 'regions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('regions.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.region.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('provincium_access')
                <li class="{{ $request->segment(1) == 'provincias' ? 'active active-sub' : '' }}">
                        <a href="{{ route('provincias.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.provincia.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('medicamento_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-heartbeat"></i>
                    <span class="title">@lang('quickadmin.medicamentos.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('modo_uso_access')
                <li class="{{ $request->segment(1) == 'modo_usos' ? 'active active-sub' : '' }}">
                        <a href="{{ route('modo_usos.index') }}">
                            <i class="fa fa-quote-right"></i>
                            <span class="title">
                                @lang('quickadmin.modo-uso.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('presentacion_farmacologica_access')
                <li class="{{ $request->segment(1) == 'presentacion_farmacologicas' ? 'active active-sub' : '' }}">
                        <a href="{{ route('presentacion_farmacologicas.index') }}">
                            <i class="fa fa-heartbeat"></i>
                            <span class="title">
                                @lang('quickadmin.presentacion-farmacologica.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('producto_access')
                <li class="{{ $request->segment(1) == 'productos' ? 'active active-sub' : '' }}">
                        <a href="{{ route('productos.index') }}">
                            <i class="fa fa-heartbeat"></i>
                            <span class="title">
                                @lang('quickadmin.producto.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('proveedoroc_access')
            <li class="{{ $request->segment(1) == 'proveedorocs' ? 'active' : '' }}">
                <a href="{{ route('proveedorocs.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.proveedoroc.title')</span>
                </a>
            </li>
            @endcan
            
            @can('itemsoc_access')
            <li class="{{ $request->segment(1) == 'itemsocs' ? 'active' : '' }}">
                <a href="{{ route('itemsocs.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.itemsoc.title')</span>
                </a>
            </li>
            @endcan
            
            @can('recepcionmercaderium_access')
            <li class="{{ $request->segment(1) == 'recepcionmercaderias' ? 'active' : '' }}">
                <a href="{{ route('recepcionmercaderias.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.recepcionmercaderia.title')</span>
                </a>
            </li>
            @endcan
            

            

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
