<?php

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

/*buscadores para autocompletar*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('clientes/{cliente}/buscar_cliente', 'ClientesController@buscar_cliente');
Route::get('productos/{product}/buscar_producto', 'ProductosController@buscar_producto');
Route::get('inventario/{product}/buscar_inventario', 'InventarioController@buscar_inventario');
Route::get('proveedores/{proveedor}/buscar_proveedor', 'ProveedoresController@buscar_proveedor');

Route::get('compras/{mes}/{anio}/{dia}/buscador', 'ComprasController@buscador');
/*fin*/

Route::middleware('auth')->group(function () {
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
Route::resource('cotizacion', 'CotizacionesController');

Route::get('cotizacion', 'CotizacionesController@calc_cotizacion')->name('cotizacion.calc_cotizacion');


Route::get('actualizar_inventario','FacturasCController@actualizar_inventario')->name('actualizar_inventario');
/*Perfin de usuarios*/
Route::get('profile','UsersController@profile')->name('profile');
	Route::patch('profile', 'UsersController@update_profile')->name('user.profile.update');
Route::resource('users','UsersController');
/*Bitácora de acciones*/
Route::resource('bitacoras','BitacoraController');


//iva
Route::put('ivaupdate', 'FacturasVController@ivaupdate')->name('ivaupdate');

Route::put('ivaupdateC', 'FacturasCController@ivaupdate')->name('ivaupdateC');

// Reportes en PDF
Route::get('facturac.pdf', 'FacturasCController@pdf')->name('facturac.pdf');
Route::get('inventario.pdf', 'InventarioController@pdf')->name('inventario.pdf');
Route::get('facturav.pdf/{id_factura}', 'FacturasVController@pdf')->name('facturav.pdf');
// Reportes en Excel
Route::get('users_view', 'ExcelController@users_view')->name('users_view');
Route::get('inventario_view', 'ExcelController@inventario_view')->name('inventario_view');


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