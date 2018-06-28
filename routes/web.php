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

Route::get('sendmail', function() {
	$data = array(
		'name' => 'Prueba de Correo',
	);

	Mail::send('emails.welcome', $data, function($message){
		$message->from('admin@pesic.cl', 'Prueba de Correo');
		$message->to('claudiosaavedra@pesic.cl')->subject('Test de Correo');
	});

	return "Tu mail ha sido enviado";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@canjear_eco');
Route::get('/userapp/perfil/create', 'UserController@getPerfil');
Route::get('/userapp/perfil/cities/{id}', 'UserController@getCity');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

	
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

	//CARGA DE ECO PUNTOS
	Route::get('/charge', 'ChargeController@index');
	Route::get('/charge/{id}/edit', 'ChargeController@edit');
	Route::post('/charge/{id}/edit', 'ChargeController@update');

	//CRUD RANKING
	Route::get('/ranking', 'RankingController@index'); //listado
	Route::get('/ranking/create', 'RankingController@create'); //formulario crear
	Route::post('/ranking', 'RankingController@store'); //guardar
	Route::get('/ranking/{id}/edit', 'RankingController@edit'); //formulario edición
	Route::post('/ranking/{id}/edit', 'RankingController@update'); //actualizar
	Route::post('/ranking/{id}/delete', 'RankingController@destroy');

	//CRUD BILLING PERIOD
	Route::get('/billingPeriod', 'billingPeriodController@index'); //listado
	Route::get('/billingPeriod/create', 'billingPeriodController@create'); //formulario crear
	Route::post('/billingPeriod', 'billingPeriodController@store'); //guardar
	Route::get('/billingPeriod/{id}/edit', 'billingPeriodController@edit'); //formulario edición
	Route::post('/billingPeriod/{id}/edit', 'billingPeriodController@update'); //actualizar
	Route::post('/billingPeriod/{id}/delete', 'billingPeriodController@destroy');

	//CRUD IMAGENES BANNER-INICIO
	Route::get('/banner', 'BannerController@index'); //listado
	Route::post('/banner', 'BannerController@store'); //guardar
	Route::post('/banner/{id}/delete', 'BannerController@destroy');


});
