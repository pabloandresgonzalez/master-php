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
//use App\Prestamo;

Route::get('/', function () {


  return view('welcome');

});

//Generales
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/configuracion', 'UserController@config')->name('config');

//Usuario
Route::get('/configuracionpass', 'UserController@configpass')->name('configpass');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename?}', 'UserController@getImage')->name('user.avatar');
Route::get('/perfil/{id?}', 'UserController@profile')->name('profile');
//Route::get('/perfil/{id}', 'UserController@profile')->name('profile');
Route::get('/gente/{search?}', 'UserController@index')->name('user.index');
Route::get('/qr_generate', 'UserController@qr_generate')->name('qr_generate');
Route::get('/user/editar/edit/{id}', 'UserController@edituser')->name('user.edit');
Route::post('/user/updaterol', 'UserController@updaterol')->name('user.updaterol');

//Bicicleta
Route::get('/bicicleta', 'BiciController@index')->name('bicicleta');
Route::get('/configuracion/bici', 'BiciController@create')->name('configbici');
//Route::post('/configuracionbici', 'UserController@createbici')->name('configbici');
Route::post('/subir-bici', 'BiciController@savebici')->name('bici.create');
Route::get('/bici/editar/edit/{id}', 'BiciController@edit')->name('bici.edit');
Route::post('/bici/update', 'BiciController@updatebici')->name('bici.update');
Route::get('/bici/avatar/{filename?}', 'BiciController@getImage')->name('bici.avatar');
Route::get('/bici/delete/{id}', 'BiciController@delete')->name('bici.delete');


//Prestamo TI
Route::get('/subir-prestamo', 'PrestamoController@create')->name('prestamo.create');
Route::post('/prestamo/save', 'PrestamoController@save')->name('prestamo.save');
Route::get('/prestamo/{id}', 'PrestamoController@detail')->name('prestamo.detail');
Route::get('/prestamo', 'PrestamoController@index')->name('prestamos');
Route::get('/prestamo/editar/edit/{id}', 'PrestamoController@edit')->name('prestamo.edit');
Route::post('/prestamo/update', 'PrestamoController@update')->name('prestamo.update');

//Prestamo Mobiliario
Route::get('/subir-mobiliario', 'PrestamoController@createmobiliario')->name('prestamo.mobiliario');
Route::post('/prestamo/savesalida', 'PrestamoController@savesalida')->name('prestamo.savesalida');

//Prestamo Parqueadero
Route::get('/subir-parqueadero', 'PrestamoController@createparqueadero')->name('prestamo.parqueadero');
Route::post('/prestamo/saveparqueadero', 'PrestamoController@saveparquadero')->name('prestamo.saveparqueadero');

//Activo
Route::get('/activo', 'ActivoController@index')->name('activos');
Route::get('/subir-activo', 'ActivoController@create')->name('activo.create');
Route::post('/activo/save', 'ActivoController@save')->name('activo.save');
Route::get('/activo/{id}', 'ActivoController@detail')->name('activo.detail');
Route::get('/activo/editar/edit/{id}', 'ActivoController@edit')->name('activo.edit');
Route::post('/activo/update', 'ActivoController@update')->name('activo.update');
Route::get('/activo/delete/{id}', 'ActivoController@delete')->name('activo.delete');

//Reportes
Route::get('/charts/prestamos/line', 'ChartController@prestamos');
Route::get('/charts/users/column', 'ChartController@users');
Route::get('/charts/users/column/data', 'ChartController@usersJson');

//FCM
Route::post('/fcm/send', 'FirebaseWebController@sendAll')->name('fcm.send');


//JSON


