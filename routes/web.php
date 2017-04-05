<?php
Route::get('/', function () {
    return redirect('/home');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => 'auth'], function () {

    Route::get('itemsocs/create/{id}','ItemsocsController@agregarConID');
    Route::get('clientes/create/{id}','ClientesController@crear');

    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('regions', 'RegionsController');
    Route::post('regions_mass_destroy', ['uses' => 'RegionsController@massDestroy', 'as' => 'regions.mass_destroy']);
    Route::resource('provincias', 'ProvinciasController');
    Route::post('provincias_mass_destroy', ['uses' => 'ProvinciasController@massDestroy', 'as' => 'provincias.mass_destroy']);
    Route::resource('comunas', 'ComunasController');
    Route::post('comunas_mass_destroy', ['uses' => 'ComunasController@massDestroy', 'as' => 'comunas.mass_destroy']);
    Route::resource('clientes', 'ClientesController');
    Route::post('clientes_mass_destroy', ['uses' => 'ClientesController@massDestroy', 'as' => 'clientes.mass_destroy']);
    Route::resource('contacto_clientes', 'ContactoClientesController');
    Route::post('contacto_clientes_mass_destroy', ['uses' => 'ContactoClientesController@massDestroy', 'as' => 'contacto_clientes.mass_destroy']);
    Route::resource('proveedors', 'ProveedorsController');
    Route::post('proveedors_mass_destroy', ['uses' => 'ProveedorsController@massDestroy', 'as' => 'proveedors.mass_destroy']);
    Route::resource('contacto_proveedors', 'ContactoProveedorsController');
    Route::post('contacto_proveedors_mass_destroy', ['uses' => 'ContactoProveedorsController@massDestroy', 'as' => 'contacto_proveedors.mass_destroy']);
    Route::resource('laboratorios', 'LaboratoriosController');
    Route::post('laboratorios_mass_destroy', ['uses' => 'LaboratoriosController@massDestroy', 'as' => 'laboratorios.mass_destroy']);
    Route::resource('modo_usos', 'ModoUsosController');
    Route::post('modo_usos_mass_destroy', ['uses' => 'ModoUsosController@massDestroy', 'as' => 'modo_usos.mass_destroy']);
    Route::resource('presentacion_farmacologicas', 'PresentacionFarmacologicasController');
    Route::post('presentacion_farmacologicas_mass_destroy', ['uses' => 'PresentacionFarmacologicasController@massDestroy', 'as' => 'presentacion_farmacologicas.mass_destroy']);
    Route::resource('productos', 'ProductosController');
    Route::post('productos_mass_destroy', ['uses' => 'ProductosController@massDestroy', 'as' => 'productos.mass_destroy']);
    Route::resource('facturas', 'FacturasController');
    Route::post('facturas_mass_destroy', ['uses' => 'FacturasController@massDestroy', 'as' => 'facturas.mass_destroy']);
    Route::resource('proveedorocs', 'ProveedorocsController');
    Route::post('proveedorocs_mass_destroy', ['uses' => 'ProveedorocsController@massDestroy', 'as' => 'proveedorocs.mass_destroy']);
    Route::resource('itemsocs', 'ItemsocsController');
    Route::post('itemsocs_mass_destroy', ['uses' => 'ItemsocsController@massDestroy', 'as' => 'itemsocs.mass_destroy']);
    Route::resource('recepcionmercaderias', 'RecepcionmercaderiasController');
    Route::post('recepcionmercaderias_mass_destroy', ['uses' => 'RecepcionmercaderiasController@massDestroy', 'as' => 'recepcionmercaderias.mass_destroy']);
});
