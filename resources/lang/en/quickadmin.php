<?php

return [
		'user-management' => [		'title' => 'Administración de usuario',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Título',		],	],
		'users' => [		'title' => 'Usuarios',		'created_at' => 'Time',		'fields' => [			'name' => 'Nombre',			'email' => 'Correo Electrónico',			'password' => 'Contraseña',			'rut' => 'Rut',			'dv' => 'Dígito Verificador',			'role' => 'Rol',			'cuenta-banco' => 'Cuenta Bancarea',			'cuenta-tipo' => 'Tipo de Cuenta',			'remember-token' => 'Token de sesión activa',		],	],
		'region' => [		'title' => 'Regiones',		'created_at' => 'Time',		'fields' => [			'nombre' => 'Nombre',			'ordinal' => 'Ordinal',		],	],
		'provincia' => [		'title' => 'Provincias',		'created_at' => 'Time',		'fields' => [			'nombre' => 'Nombre',			'region' => 'Region',		],	],
		'comuna' => [		'title' => 'Comunas',		'created_at' => 'Time',		'fields' => [			'nombre' => 'Nombre',			'provincia' => 'Provincia',		],	],
		'regiones-provincias-y-comunas' => [		'title' => 'Organización Territorial',		'created_at' => 'Time',		'fields' => [		],	],
		'cliente' => [		'title' => 'Clientes',		'created_at' => 'Time',		'fields' => [			'rut' => 'Rut',			'dv' => 'Dígito Verificador',			'nombre' => 'Nombre',			'direccion-factura' => 'Dirección factura',			'direccion-despacho' => 'Direccion despacho',			'comuna' => 'Comuna',		],	],
		'contacto-cliente' => [		'title' => 'Contacto Cliente',		'created_at' => 'Time',		'fields' => [			'nombre' => 'Nombre',			'apellido' => 'Apellido',			'telefono' => 'Teléfono',			'email' => 'Email',			'cliente' => 'Cliente',		],	],
		'proveedor' => [		'title' => 'Proveedor',		'created_at' => 'Time',		'fields' => [			'nombre' => 'Nombre',			'rut' => 'Rut',			'dv' => 'Dígito Verificador',			'direccion' => 'Direccion',			'telefono' => 'Teléfono',			'email' => 'Email',			'comuna' => 'Comuna',		],	],
		'administracion-general' => [		'title' => 'Administración General',		'created_at' => 'Time',		'fields' => [		],	],
		'contacto-proveedor' => [		'title' => 'Contacto proveedor',		'created_at' => 'Time',		'fields' => [			'nombre' => 'Nombre',			'apellido' => 'Apellido',			'telefono' => 'Teléfono',			'email' => 'Email',			'proveedor' => 'Proveedor',		],	],
		'laboratorio' => [		'title' => 'Laboratorio',		'created_at' => 'Time',		'fields' => [			'nombre' => 'Nombre',			'rut' => 'Rut',			'dv' => 'Dv',			'direccion' => 'Direccion',			'ciudad' => 'Ciudad',			'telefono' => 'Teléfono',			'email' => 'Email',		],	],
		'medicamentos' => [		'title' => 'Medicamentos',		'created_at' => 'Time',		'fields' => [		],	],
		'modo-uso' => [		'title' => 'Modo de Uso',		'created_at' => 'Time',		'fields' => [			'uso' => 'Uso',		],	],
		'presentacion-farmacologica' => [		'title' => 'Presentación Farmacológica',		'created_at' => 'Time',		'fields' => [			'nombre' => 'Nombre',			'nombre-corto' => 'Nombre corto',		],	],
		'producto' => [		'title' => 'Producto',		'created_at' => 'Time',		'fields' => [			'nombre' => 'Nombre',			'concentracion' => 'Concentración',			'precio-bodega' => 'Precio bodega',			'laboratorio' => 'Laboratorio',			'presentacion' => 'Presentación Farmacológica',			'unidad-envase' => 'Unidad envase',			'modo-uso' => 'Modo de Uso',		],	],
		'facturas' => [		'title' => 'Facturas',		'created_at' => 'Time',		'fields' => [			'folio' => 'Folio',			'vendedor' => 'Vendedor',			'fecha' => 'Fecha',			'cliente' => 'Cliente',			'producto' => 'Producto',			'cantidad' => 'Cantidad',			'precio' => 'Precio',			'condicion-pago' => 'Condición de Pago',			'estado-pago' => '¿Pagado?',			'documento-valido' => 'Documento válido',		],	],
		'proveedoroc' => [		'title' => 'Datos OC',		'created_at' => 'Time',		'fields' => [			'folio' => 'Folio',			'proveedor' => 'Proveedor',			'fecha' => 'Fecha',			'observaciones' => 'Observaciones',		],	],
		'itemsoc' => [		'title' => 'Items OC',		'created_at' => 'Time',		'fields' => [			'folio' => 'Folio',			'producto' => 'Producto',			'presentancion' => 'Presentanción',			'cantidad' => 'Cantidad',			'precio-unidad' => 'Precio unidad',			'observaciones' => 'Observaciones',		],	],
		'recepcionmercaderia' => [		'title' => 'Recepción mercadería',		'created_at' => 'Time',		'fields' => [			'proveedor' => '# OC',			'fecha' => 'Fecha',			'producto' => 'Producto',			'lote' => 'Lote',			'fecha-vencimiento' => 'Fecha vencimiento',			'cantidad' => 'Cantidad',		],	],
	'qa_create' => 'Create',
	'qa_save' => 'Save',
	'qa_edit' => 'Edit',
	'qa_view' => 'View',
	'qa_update' => 'Update',
	'qa_list' => 'List',
	'qa_no_entries_in_table' => 'No entries in table',
	'custom_controller_index' => 'Custom controller index.',
	'qa_logout' => 'Logout',
	'qa_add_new' => 'Add new',
	'qa_are_you_sure' => 'Are you sure?',
	'qa_back_to_list' => 'Back to list',
	'qa_dashboard' => 'Dashboard',
	'qa_delete' => 'Delete',
	'quickadmin_title' => 'DrogueríaConcepción',
];