<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('clientes/{cliente}/buscar_cliente', 'ClientesController@buscar_cliente');

Route::get('clientes/{cliente}/buscar_clientes', 'ClientesController@buscar_clientes');

Route::resource('proveedores', 'ProveedoresController');
Route::resource('productos', 'ProductosController');
Route::resource('clientes', 'ClientesController');
Route::resource('facturav', 'FacturasVController');
Route::resource('facturac', 'FacturasCController');
Route::resource('venta', 'VentasController');
Route::resource('compra', 'ComprasController');
Route::resource('empresa', 'EmpresaController');
Route::resource('cajachica', 'CajaChicaController');
Route::resource('diario', 'DiarioController');
Auth::routes();
Route::middleware('auth')->group(function () {
/*Perfin de usuarios*/
Route::get('profile','UsersController@profile')->name('profile');
	Route::patch('profile', 'UsersController@update_profile')->name('user.profile.update');
Route::resource('users','UsersController');
/*Bitácora de acciones*/
Route::resource('bitacoras','BitacoraController');

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