<?php

Route::get('/', function () {
    return view('auth/login')->name('login');;
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

Route::get('compras/{mes}/{anio}/{dia}/buscador', 'ComprasController@buscador');

Route::get('cotizacion/{product}/buscar_producto', 'CotizacionesController@buscar_producto');


Route::get('clients/{user_id}/search','CotizacionesController@search_clients');
    Route::get('products/{user_id}/search','CotizacionesController@search_products');
    Route::get('products/{product_id}/add','CotizacionesController@products_add');
    Route::get('watch/{quotation_id}/watch','CotizacionesController@watch')->name('quotations.watch');
/*fin*/


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

//Route::get('cotizacion', 'CotizacionesController@calc_cotizacion')->name('cotizacion.calc_cotizacion');


Route::get('actualizar_inventario','FacturasCController@actualizar_inventario')->name('actualizar_inventario');
Route::get('diario.mayor','DiarioController@mayor')->name('diario.mayor');
Route::get('diario.historial','DiarioController@historial')->name('historial');
Route::get('diario.balance','DiarioController@balance')->name('diario.balance');

/*Perfin de usuarios*/
Route::get('profile','UsersController@profile')->name('profile');
    Route::patch('profile', 'UsersController@update_profile')->name('user.profile.update');
    Route::get('cambiar_clave','UsersController@cambiar_clave')->name('cambiar_clave');

    Route::put('cambiar_tipo','UsersController@cambiar_tipo')->name('cambiar_tipo');
Route::resource('users','UsersController');
/*Bitácora de acciones*/
Route::resource('bitacoras','BitacoraController');


Route::get('diario.abrir', 'DiarioController@abrir')->name('diario.abrir');
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

Route::get('facturac.pdf/{id_factura}', 'FacturasCController@pdf')->name('facturac.pdf');
Route::get('inventario.pdf', 'InventarioController@pdf')->name('inventario.pdf');
Route::get('bitacora.pdf', 'BitacoraController@pdf')->name('bitacora.pdf');
Route::get('diario.pdf', 'DiarioController@pdf')->name('diario.pdf');
Route::get('mayor.pdf', 'DiarioController@pdfmayor')->name('mayor.pdf');
Route::get('facturav.pdf/{id_factura}', 'FacturasVController@pdf')->name('facturav.pdf');
Route::get('cajachica.pdf','CajaChicaController@pdf')->name('cajachica.pdf');
Route::get('cajachica.egreso','CajaChicaController@egreso')->name('cajachica.egreso');
Route::get('cajachica.ingreso','CajaChicaController@ingreso')->name('cajachica.ingreso');
Route::get('cajachica.index','CajaChicaController@index')->name('cajachica.index');
Route::get('cotizacion.pdf/{id_cotizacion}', 'CotizacionesController@pdf')->name('cotizacion.pdf');
// Reportes en Excel
Route::get('users_view', 'ExcelController@users_view')->name('users_view');
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