<?php

Route::get('/', function () {
    return view('auth/login')->name('login');
});
Route::post('recuperando_clave','Auth\ResetPasswordController@recuperando_clave')->name('recuperando_clave');

Auth::routes(['verify' => true]);
Route::middleware('auth', 'verified')->group(function () {
/*buscadores para autocompletar*/

Route::get('/home', 'HomeController@index')->name('home');
/*buscar para autocompletar*/
Route::get('clientes/{cliente}/buscar_cliente', 'ClientesController@buscar_cliente');
Route::get('productos/{product}/buscar_producto', 'ProductosController@buscar_producto');
Route::get('inventario/{product}/buscar_inventario', 'InventarioController@buscar_inventario');
Route::get('proveedores/{proveedor}/buscar_proveedor', 'ProveedoresController@buscar_proveedor');

Route::get('cotizacion/{n_cotizacion}/eliminar', 'CotizacionesController@eliminar');

Route::get('facturac/{n_factura}/eliminar', 'FacturasCController@eliminar');
Route::get('facturav/{n_factura}/eliminar', 'FacturasVController@eliminar');
Route::get('proveedores/{id}/eliminar', 'ProveedoresController@eliminar');

Route::get('cuentas/{id}/eliminar', 'CuentasController@eliminar');

Route::get('productos/{id}/eliminar', 'ProductosController@eliminar');
Route::get('bienes/{id}/eliminar', 'BienesController@eliminar');
Route::get('departamento/{id}/eliminar', 'DepartamentoController@eliminar');
Route::get('cargos/{id}/eliminar', 'CargosController@eliminar');
Route::get('empleado/{id}/eliminar', 'EmpleadoController@eliminar');

Route::get('clientes/{id}/eliminar', 'ClientesController@eliminar');


Route::get('compras/{mes}/{anio}/{dia}/buscador', 'ComprasController@buscador');

Route::get('cotizacion/{product}/buscar_producto', 'CotizacionesController@buscar_producto');


Route::get('clients/{user_id}/search','CotizacionesController@search_clients');
    Route::get('products/{user_id}/search','CotizacionesController@search_products');

    Route::get('products/{product_id}/add','CotizacionesController@products_add');
      Route::get('bienes/{id}/add','InventarioBienesController@bienes_add');

      Route::get('bienesinventario/{id}/add','BienesInventarioController@bienesinventario_add');

//Aquí estoy trabajando 
    Route::get('chat/{mensaje}', 'UsersController@chat');
//hasta aquí 

    Route::get('watch/{quotation_id}/watch','CotizacionesController@watch')->name('quotations.watch');
/*fin*/

Route::resource('contratos', 'ContratosController');
Route::resource('inventariobienes', 'InventarioBienesController');

Route::resource('bienesinventario', 'BienesInventarioController');
Route::resource('cargos', 'CargosController');
Route::resource('resoluciones', 'ResolucionesController');
Route::resource('empleado', 'EmpleadosController');
Route::resource('bienes', 'BienesController');
Route::resource('departamento', 'DepartamentoController');
Route::resource('proveedores','ProveedoresController');
Route::resource('productos', 'ProductosController');
Route::resource('clientes', 'ClientesController');
Route::resource('facturav', 'FacturasVController');
Route::resource('facturac', 'FacturasCController');
Route::resource('venta', 'VentasController');
Route::resource('compra', 'ComprasController');
Route::resource('empresa', 'EmpresaController');
Route::resource('cajachica', 'CajaChicaController');
Route::resource('diario', 'DiarioController');
Route::resource('inventario', 'InventarioController');
Route::resource('notificaciones', 'NotificacionesController');

Route::resource('cotizacion', 'CotizacionesController');
Route::resource('cuentas', 'CuentasController');
Route::resource('balances', 'BalancesController');
Route::resource('ayuda', 'AyudaController');

//Route::get('cotizacion', 'CotizacionesController@calc_cotizacion')->name('cotizacion.calc_cotizacion');


Route::get('actualizar_inventario','FacturasCController@actualizar_inventario')->name('actualizar_inventario');
Route::get('mayor','DiarioController@mayor')->name('mayor');
Route::get('mayor.historial','DiarioController@historial_mayor')->name('historial_mayor');
Route::get('diario.historial','DiarioController@historial')->name('historial');
Route::get('diario.balance','DiarioController@balance')->name('diario.balance');
Route::get('balances.historial','BalancesController@historial')->name('historial_balances');
/*Perfin de usuarios*/
Route::get('profile','UsersController@profile')->name('profile');
    Route::patch('profile', 'UsersController@update_profile')->name('user.profile.update');
    Route::get('cambiar_clave','UsersController@cambiar_clave')->name('cambiar_clave');

    Route::put('cambiar_tipo','UsersController@cambiar_tipo')->name('cambiar_tipo');
Route::resource('users','UsersController');
/*Bitácora de acciones*/
Route::resource('bitacoras','BitacoraController');


Route::get('diario.abrir', 'DiarioController@abrir')->name('diario.abrir');

Route::match(['get', 'post'], '/busquedaAjax/{departamento}/buscar', 'BienesInventarioController@busquedaAjax')->name('post');

Route::match(['get', 'post'], '/bienesinven/{id}/depart', 'BienesInventarioController@bienesinvendepart')->name('post');

Route::match(['get', 'post'], '/responsablesporuso/{id}/acta', 'BienesInventarioController@actaresponsablesporuso')->name('post');

Route::get('diario.cerrar/{n_folio}', 'DiarioController@cerrar')->name('diario.cerrar');

Route::match(['get', 'post'], '/busquedaAjax/{cuenta}/buscar', 'DiarioController@busquedaAjax')->name('post');

Route::match(['get', 'post'], '/busqueda/{anio}/buscar', 'DiarioController@busqueda')->name('post');

Route::match(['get', 'post'], '/busquedaA/{anio}/buscar', 'HomeController@busquedaA')->name('post');

//iva
Route::put('ivaupdate', 'FacturasVController@ivaupdate')->name('ivaupdate');

Route::put('ivaupdateC', 'FacturasCController@ivaupdate')->name('ivaupdateC');

Route::put('descupdate', 'CotizacionesController@descupdate')->name('descupdate');

// Reportes en PDF


Route::get('diario.individual/{n_folio}','DiarioController@individual')->name('diario.individual');

Route::get('mayor.indimayor/{anio}','DiarioController@mayorindividual')->name('mayor.indimayor');

Route::get('compra.pdfcompra','ComprasController@pdfcompra')->name('compra.pdfcompra');
Route::get('venta.pdfventa','ComprasController@pdfventa')->name('venta.pdfventa');

Route::get('balance.pdfcomprobacion','BalancesController@pdfcomprobacion')->name('balance.pdfcomprobacion');

Route::get('balance.pdfgeneral','BalancesController@pdfgeneral')->name('balance.pdfgeneral');

Route::get('balance.pdfgananciasp','BalancesController@pdfgananciasp')->name('balance.pdfgananciasp');

Route::get('facturac.pdf/{id_factura}', 'FacturasCController@pdf')->name('facturac.pdf');
Route::get('inventario.pdf', 'InventarioController@pdf')->name('inventario.pdf');
Route::get('bitacora.pdf', 'BitacoraController@pdf')->name('bitacora.pdf');
Route::get('diario.pdf', 'DiarioController@pdf')->name('diario.pdf');
Route::get('mayor.pdf', 'DiarioController@pdfmayor')->name('mayor.pdf');

Route::get('proveedores.pdf', 'ProveedoresController@pdf')->name('proveedores.pdf');

Route::get('productos.pdf', 'ProductosController@pdf')->name('productos.pdf');

Route::get('inventariob_personas.pdf', 'InventarioBienesController@inventariob_personas_pdf')->name('inventariob_personas.pdf');

Route::get('bienes.pdf', 'BienesController@pdf')->name('bienes.pdf');
Route::get('contratos.pdf', 'ContratosController@pdf')->name('contratos.pdf');
Route::get('contratosgeneral.pdf', 'ContratosController@pdfgeneral')->name('contratosgeneral.pdf');



Route::get('resolucionesgeneral.pdf', 'ResolucionesController@pdfgeneral')->name('resolucionesgeneral.pdf');

Route::get('noti_resolucion.pdf/{n_resolucion}', 'ResolucionesController@noti_resolucion')->name('noti_resolucion.pdf');



Route::get('noti_contrato.pdf/{numero}', 'ContratosController@notipdf')->name('noti_contrato.pdf');

Route::get('resoluciones.pdf', 'ResolucionesController@pdf')->name('resoluciones.pdf');
Route::get('empleado.pdf', 'EmpleadosController@pdf')->name('empleado.pdf');
Route::get('cargos.pdf', 'CargosController@pdf')->name('cargos.pdf');
Route::get('departamento.pdf', 'DepartamentoController@pdf')->name('departamento.pdf');

Route::get('clientes.pdf', 'ClientesController@pdf')->name('clientes.pdf');

Route::get('cuentas.pdf', 'CuentasController@pdf')->name('cuentas.pdf');

Route::post('mayorindividual.pdf/{codigo}', 'DiarioController@mayorpdfindividual')->name('mayorindividual.pdf');


Route::post('bienesinvendepart.pdf/{id}', 'BienesInventarioController@bienesinvendepart')->name('bienesinvendepart.pdf');


Route::post('bienesinventario.pdf/{id_inventario}', 'BienesInventarioController@asignar_departamento')->name('bienesinventario.pdf');

Route::get('contratos.pdf/{numero}', 'ContratosController@pdf')->name('contratos.pdf');
Route::get('resoluciones.pdf/{numero}', 'ResolucionesController@pdf')->name('resoluciones.pdf');
Route::get('facturav.pdf/{id_factura}', 'FacturasVController@pdf')->name('facturav.pdf');
Route::get('contratos.crear','ContratosController@crear')->name('contratos.crear');
Route::get('resoluciones.crear','ResolucionesController@crear')->name('resoluciones.crear');

Route::get('inventariobienes.asignar_personas','InventarioBienesController@asignar_personas')->name('inventariobienes.asignar_personas');

Route::get('inventariobienes.asignar_acta','InventarioBienesController@asignar_acta')->name('inventariobienes.asignar_acta');


Route::get('bienesinventario.asignar_departamentos','BienesInventarioController@asignar_departamentos')->name('bienesinventario.asignar_departamentos');

Route::get('bienesinventario.asignar_departamentos','BienesInventarioController@asignar_departamentos')->name('bienesinventario.asignar_departamentos');

Route::get('cajachica.pdf','CajaChicaController@pdf')->name('cajachica.pdf');
Route::get('cajachica.egreso','CajaChicaController@egreso')->name('cajachica.egreso');
Route::get('cajachica.ingreso','CajaChicaController@ingreso')->name('cajachica.ingreso');
Route::get('cajachica.index','CajaChicaController@index')->name('cajachica.index');
Route::get('cotizacion.pdf/{id_cotizacion}', 'CotizacionesController@pdf')->name('cotizacion.pdf');

// Reportes en Excel
Route::get('users_view', 'ExcelController@users_view')->name('users_view');
Route::get('diario_view', 'ExcelController@diario_view')->name('diario_view');
Route::get('mayor_view', 'ExcelController@mayor_view')->name('mayor_view');
Route::get('compra_view', 'ExcelController@compra_view')->name('compra_view');
Route::get('venta_view', 'ExcelController@venta_view')->name('venta_view');
//Route::get('caja_view', 'ExcelController@caja_view')->name('caja_view');
Route::get('comprobacion_view', 'ExcelController@comprobacion_view')->name('comprobacion_view');
Route::get('gananciasp_view', 'ExcelController@gananciasp_view')->name('gananciasp_view');

Route::get('general_view', 'ExcelController@general_view')->name('general_view');

Route::get('inventario_view', 'ExcelController@inventario_view')->name('inventario_view');
Route::get('bitacora_view', 'ExcelController@bitacora_view')->name('bitacora_view');


/*rutas para el backup*/
Route::get("backup", "BackupController@index")->name("backup.index");

Route::get('backup/create', 'BackupController@create')->name('backup.create');
Route::get('backup/restore/{filename}', 'BackupController@restore')->name('backup.restore');
Route::get('backup/download/{filename}', 'BackupController@download')->name('backup.download');
Route::get('backup/delete/{filename}', 'BackupController@delete')->name('backup.delete');
    });
/*fin backup*/

//PRIVILEGIOS 
Route::resource('privilegios','PrivilegiosController');
Route::post('editP','PrivilegiosController@editarPrivilegio')->name('editP');
Route::get('permisos/{id_user}/buscar','PrivilegiosController@buscar_privilegios');
Route::get('permisos/{id_privilegio}/{opcion}/{id_usuario}/actualizando','PrivilegiosController@actualizando');
Route::post('usuarios/update_privilegios/{id}','UsuariosController@update_privilegios')->name('usuarios.update_privilegios');


/*rutas para cambiar personalizacion de la interfaz*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('pages-logout', 'RoutingController@logout');
    Route::get('/', 'RoutingController@index');
    Route::get('{first}/{second}/{third}', 'RoutingController@thirdLevel');
    Route::get('{first}/{second}', 'RoutingController@secondLevel');
    Route::get('{any}', 'RoutingController@root');
});
/*fin*/


/*mensajes*/
/*Auth::routes();

Route::get('/', 'MessageController@index');
Route::get('messages', 'MessageController@fetch')->middleware('auth');
Route::post('messages', 'MessageController@sentMessage')->middleware('auth');*/