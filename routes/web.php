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
//Route::post('/home', 'HomeController@canjear_eco');
Route::get('/userapp/perfil/create', 'UserController@getPerfil');
Route::get('/userapp/perfil/cities/{id}', 'UserController@getCity');
Route::post('/userapp/perfil/{id}/msn', 'UserController@actPerfil');
Route::get('/userapp/contacto', 'ContactController@index');
Route::post('/userapp/contacto/create', 'ContactController@contactmail');
Route::get('/userapp/actividad', 'MyActivitieController@index');
Route::get('/userapp/comunidad', 'CommunityController@index');
Route::get('/userapp/historial', 'HistoryController@index');
Route::get('/userapp/canjes', 'CanjesController@index');
Route::post('/userapp/canjes/confirmed', 'CanjesController@confirmed');
Route::get('/userapp/canjes/result_transaction/{number_bip}/{quantity_eco}/{grantee_id}/{quantity_eco_donar}', 'CanjesController@canjear_eco');
Route::get('/admin/user/msn', 'UserController@redirect_reset_pass');
Route::get('/userapp/equivalence', 'EquivalenceController@index2'); //listado
Route::get('/userapp/periodos-facturacion', 'PageController@pagePeriodo');
Route::get('/userapp/proceso-canje', 'PageController@procesoCanje');
Route::get('userapp/maquinas', 'PageController@maquinas');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

	
	//CRUD USUARIOS
	Route::get('/user', 'UserController@index'); //listado
	Route::get('/user/create', 'UserController@create'); //formulario crear
	Route::post('/user', 'UserController@store'); //guardar
	Route::get('/user/{id}/edit', 'UserController@edit'); //formulario edición
	Route::post('/user/{id}/edit', 'UserController@update'); //actualizar
	Route::get('/user/{id}/delete', 'UserController@destroy');
	Route::get('/user/excel_user', 'UserController@excelUser');

	//CRUD MACHINE
	Route::get('/machine', 'MachineController@index'); //listado
	Route::get('/machine/create', 'MachineController@create'); //formulario crear
	Route::post('/machine', 'MachineController@store'); //guardar
	Route::get('/machine/{id}/location', 'MachineController@location'); //formulario ingreso locations
	//Ruta para el Combo dependiente
	Route::get('/machine/cities/{id}', 'MachineController@getCity');
	//Route::get('/machine/{id}/edit', 'MachineController@edit'); //formulario edición
	//Route::post('/machine/{id}/edit', 'MachineController@update'); //actualizar
	Route::get('/machine/{id}/delete', 'MachineController@destroy');

	//EXCHANGE
	Route::get('/exchange', 'ExchangeController@index'); //listado cargas bip
	Route::get('/exchange/donaciones', 'ExchangeController@donaciones'); //listado donaciones
	Route::get('/exchange/{id}/change', 'ExchangeController@changeStatus'); //actualizar
	Route::get('/exchange/{id}/change_grantee', 'ExchangeController@changeStatusGrantee'); //actualizar donaciones
	Route::get('/exchange/excel_canjes', 'ExchangeController@excelCanje');
	Route::get('/exchange/excel_donaciones', 'ExchangeController@excelDonaciones');
	Route::post('/exchange/donaciones', 'CommentController@commentControllerExchangeGrantee');
	Route::post('/exchange/', 'CommentController@commentControllerExchange');

	//CARGA DE ECO PUNTOS
	Route::get('/charge', 'ChargeController@index');
	Route::get('/charge/{id}/edit', 'ChargeController@edit');
	Route::post('/charge/{id}/edit', 'ChargeController@update');

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
	Route::get('/banner/{id}/delete', 'BannerController@destroy');

	//CRUD DONATARIOS
	Route::get('/grantee', 'GranteeController@index'); //listado
	Route::get('/grantee/create', 'GranteeController@create'); //formulario crear
	Route::post('/grantee', 'GranteeController@store'); //guardar
	Route::get('/grantee/{id}/edit', 'GranteeController@edit'); //formulario edición
	Route::post('/grantee/{id}/edit', 'GranteeController@update'); //actualizar
	Route::get('/grantee/{id}/delete', 'GranteeController@destroy');

	//CRUD EQUIVALENCIAS
	Route::get('/equivalence', 'EquivalenceController@index'); //listado
	Route::get('/equivalence/{id}/edit', 'EquivalenceController@edit'); //formulario edición
	Route::post('/equivalence/{id}/edit', 'EquivalenceController@update'); //actualizar
	Route::post('/equivalence/{id}/delete', 'EquivalenceController@destroy');

	//CRUD VENTAS
	Route::get('/sale', 'SaleController@index'); //listado
	Route::get('/sale/create', 'SaleController@create'); //formulario crear
	Route::post('/sale', 'SaleController@store'); //guardar
	Route::get('/sale/{id}/edit', 'SaleController@edit');
	Route::post('/sale/{id}/edit', 'SaleController@update'); 
	Route::get('/sale/{id}/delete', 'SaleController@destroy');

	//Reportes
	Route::get('/report/cargas_bip', 'ReportController@rpt_cargas_bip');
	Route::get('/report/excel_cargas_bip', 'ReportController@excelCargasBip');
	Route::get('/report/donaciones', 'ReportController@rpt_donaciones');
	Route::get('/report/excel_donaciones', 'ReportController@excelDonaciones');
	Route::get('/report/saldoDisponible', 'ReportController@rpt_saldoDisponible');
	Route::get('/report/excel_saldoDisponible', 'ReportController@excelSaldoDisponible');
	Route::get('/report/usuariosRegistrados', 'ReportController@usuariosRegistrados');
	Route::get('/report/canjesRegistrados', 'ReportController@canjesRegistrados');


});
