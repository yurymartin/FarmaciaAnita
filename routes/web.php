<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/', 'IndexController');

Route::get('/team', function () {
    return view('admin.team');
});
Route::resource('/tipoproductos', 'Tipo_ProductoController');
Route::get('/tipoproductos/altabaja/{estado}/{id}', 'Tipo_ProductoController@altabaja');
Route::resource('/ubicaciones', 'UbicacionController');
Route::get('/ubicaciones/altabaja/{estado}/{id}', 'UbicacionController@altabaja');
Route::resource('/sintomas', 'SintomaController');
Route::get('/sintomas/altabaja/{estado}/{id}', 'SintomaController@altabaja');
Route::resource('/proveedores', 'ProveedorController');
Route::get('/proveedores/altabaja/{estado}/{id}', 'ProveedorController@altabaja');
Route::resource('/estado_compras', 'Estado_CompraController');
Route::get('/estado_compras/altabaja/{estado}/{id}', 'Estado_CompraController@altabaja');
Route::resource('/estado_ventas', 'Estado_VentaController');
Route::get('/estado_ventas/altabaja/{estado}/{id}', 'Estado_VentaController@altabaja');
Route::resource('/compras/tipo_comprobantes', 'Tipo_ComprobanteController');
Route::get('/compras/tipos_comprobantes/altabaja/{estado}/{id}', 'Tipo_ComprobanteController@altabaja');
Route::resource('/ventas/tipo_comprobantes', 'Tipo_ComprobanteController');
Route::get('/ventas/tipos_comprobantes/altabaja/{estado}/{id}', 'Tipo_ComprobanteController@altabaja');
Route::resource('/pagos', 'PagoController');
Route::get('/pagos/altabaja/{estado}/{id}', 'PagoController@altabaja');
Route::resource('/compras', 'CompraController');
Route::get('/compras/altabaja/{estado}/{id}', 'CompraController@altabaja');
Route::resource('/clientes', 'ClienteController');
Route::get('/clientes/altabaja/{estado}/{id}', 'ClienteController@altabaja');
Route::resource('/ventas', 'VentaController');
Route::get('/ventas/altabaja/{estado}/{id}', 'VentaController@altabaja');
Route::get('/ventas-boleta/{id}', 'VentaController@boleta')->name('ventas.boleta');

Route::resource('/asistente', 'Producto_has_SintomaController');

Route::group(['middleware' => 'admin'], function () {
    Route::resource('/users', 'UserController');
    Route::get('/users/altabaja/{estado}/{id}', 'UserController@altabaja');
    Route::resource('/tipousers', 'TipouserController');
    Route::get('/tipousers/altabaja/{estado}/{id}', 'TipouserController@altabaja');
    Route::resource('/especialidades', 'EspecialidadController');
    Route::get('/especialidades/altabaja/{estado}/{id}', 'EspecialidadController@altabaja');
    Route::resource('/empleados', 'EmpleadoController');
    Route::get('/empleados/altabaja/{estado}/{id}', 'EmpleadoController@altabaja');
    Route::resource('/productos', 'ProductoController');
    Route::get('/productos/altabaja/{estado}/{id}', 'ProductoController@altabaja');
});
