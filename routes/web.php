<?php
use Illuminate\Support\Facades\Route;
use App\Producto;

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



//PDF de la Nota de compra (Práctica)
Route::get('nota', 'NotaController@pdf');

//PDF del Recibo de compra
Route::get('recibo', 'ReciboController@pdf');




//TRAER PRODUCTOS POR CATEGORIAS
Route::apiResource('apiCategoria', 'CategoriaController');

Route::get('apiProducto','ProductoController@obtenerAbarrotes');
Route::post('apiProducto', 'ProductoController@store');
Route::delete('apiProducto/{id}', 'ProductoController@destroy');
Route::get('apiProducto/{id}', 'ProductoController@edit');
Route::patch('apiProducto/{id}', 'ProductoController@update');




Route::get('apiFarmacia','ProductoController@obtenerFarmacias');
Route::post('apiFarmacia', 'FarmaciaController@store');
Route::delete('apiFarmacia/{id}', 'FarmaciaController@destroy');
Route::get('apiFarmacia/{id}', 'FarmaciaController@edit');
Route::patch('apiFarmacia/{id}', 'FarmaciaController@update');

Route::get('/search-product', 'VentasController@searchProduct');
//Route::get('apiJuguete','ProductoController@obtenerJuguetes');


//Route::get('apiPapeleria', 'ProductoController@obtenerPapelerias');


//API USUARIO
Route::apiResource('apiUsuario','UsuarioController');

//SESION DEL USUARIO (DATOS)
Route::get('sesion', function(){
   return view('sesion.sesion');
})->middleware('auth')->name('sesion');

Route::get('/sesion-logout', function(){
   Auth::logout();
   return redirect('/login');
 })->name('sesion-logout');


//CRUD INVENTARIO
Route::get('inventario', function(){
	return view('inventario.inventario');
})->middleware('auth')->name('inventario');

Route::get('/inventario-logout', function(){
	Auth::logout();
	return redirect('/login');
 })->name('inventario-logout');


//APARTADO DE VENTAS
Route::get('venta', function(){
	return view('ventas.ventas');
})->middleware('auth')->name('ventas');

 Route::get('/venta-logout', function(){
	Auth::logout();
	return redirect('/login');
 })->name('venta-logout');






 Route::get('/', function () {
    return view('welcome');
 });


 Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');
