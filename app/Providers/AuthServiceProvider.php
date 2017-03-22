<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Region
        Gate::define('region_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('region_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('region_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('region_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('region_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Provincia
        Gate::define('provincium_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('provincium_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('provincium_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('provincium_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('provincium_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Comuna
        Gate::define('comuna_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('comuna_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('comuna_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('comuna_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('comuna_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Regiones, provincias y comunas
        Gate::define('regiones,_provincias_y_comuna_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });

        // Auth gates for: Cliente
        Gate::define('cliente_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('cliente_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('cliente_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('cliente_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('cliente_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Contacto cliente
        Gate::define('contacto_cliente_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('contacto_cliente_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contacto_cliente_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contacto_cliente_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('contacto_cliente_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Proveedor
        Gate::define('proveedor_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('proveedor_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('proveedor_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('proveedor_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('proveedor_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Administración general
        Gate::define('administración_general_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });

        // Auth gates for: Contacto proveedor
        Gate::define('contacto_proveedor_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('contacto_proveedor_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contacto_proveedor_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contacto_proveedor_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('contacto_proveedor_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Laboratorio
        Gate::define('laboratorio_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('laboratorio_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('laboratorio_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('laboratorio_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('laboratorio_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Medicamentos
        Gate::define('medicamento_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });

        // Auth gates for: Modo uso
        Gate::define('modo_uso_access', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('modo_uso_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('modo_uso_edit', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('modo_uso_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('modo_uso_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Presentacion farmacologica
        Gate::define('presentacion_farmacologica_access', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('presentacion_farmacologica_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('presentacion_farmacologica_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('presentacion_farmacologica_view', function ($user) {
            return in_array($user->role_id, [1, 4]);
        });
        Gate::define('presentacion_farmacologica_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Producto
        Gate::define('producto_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('producto_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('producto_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('producto_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4, 5]);
        });
        Gate::define('producto_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Facturas
        Gate::define('factura_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('factura_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('factura_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('factura_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('factura_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
