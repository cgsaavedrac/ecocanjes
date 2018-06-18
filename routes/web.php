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
Route::post('/home', 'HomeController@canjear_eco');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

	//DASHBOARD
	Route::get('/homeddd', 'HomeController@index')->name('home');
	
	//CRUD USUARIOS
	Route::get('/user', 'UserController@index'); //listado
	Route::get('/user/create', 'UserController@create'); //formulario crear
	Route::post('/user', 'UserController@store'); //guardar
	Route::get('/user/{id}/edit', 'UserController@edit'); //formulario edición
	Route::post('/user/{id}/edit', 'UserController@update'); //actualizar
	Route::post('/user/{id}/delete', 'UserController@destroy');

	//CRUD MACHINE
	Route::get('/machine', 'MachineController@index'); //listado
	Route::get('/machine/create', 'MachineController@create'); //formulario crear
	Route::post('/machine', 'MachineController@store'); //guardar
	Route::get('/machine/{id}/location', 'MachineController@location'); //formulario ingreso locations
	//Ruta para el Combo dependiente
	Route::get('/machine/cities/{id}', 'MachineController@getCity');
	//Route::get('/machine/{id}/edit', 'MachineController@edit'); //formulario edición
	//Route::post('/machine/{id}/edit', 'MachineController@update'); //actualizar
	Route::post('/machine/{id}/delete', 'MachineController@destroy');

	//EXCHANGE
	Route::get('/exchange', 'ExchangeController@index'); //listado
	Route::post('/exchange/{id}/change', 'ExchangeController@changeStatus'); //actualizar

});
