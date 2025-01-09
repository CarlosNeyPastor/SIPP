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

$controller_path = 'App\Http\Controllers';

// Main Page Route

// pages


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
$controller_path = 'App\Http\Controllers';

    //Index
    Route::get('/', $controller_path . '\pages\HomePage@index')->name('inicio');
    //Casos - events
    Route::get('/Casos', $controller_path . '\pages\EventController@index')->name('casos');
    Route::get('/Casos/create', $controller_path . '\pages\EventController@create')->name('EventController.create');
    Route::get('/Casos/search', $controller_path . '\pages\EventController@search')->name('EventController.search');
    Route::get('/Casos/searchPendiente', $controller_path . '\pages\EventController@searchByPendiente')->name('EventController.searchByPendiente');
    Route::get('/Casos/searchEvacuados', $controller_path . '\pages\EventController@searchByEvacuate')->name('EventController.searchByEvacuate');
    Route::get('/Casos/searchSinEfecto', $controller_path . '\pages\EventController@searchBySinEffect')->name('EventController.searchBySinEffect');
    Route::get('/Casos/searchPedida', $controller_path . '\pages\EventController@searchByPedida')->name('EventController.searchByPedida');

    //Pericial 2023
    Route::get('/Casos23', $controller_path . '\pages\pericial\Event23Controller@index')->name('casos23');
    Route::get('/Casos23/search', $controller_path . '\pages\pericial\Event23Controller@search')->name('Event23Controller.search');
    Route::get('/Casos23/showNoEdit/{event_id}', $controller_path . '\pages\pericial\Event23Controller@showNoEdit')->name('Event23Controller.showNoEdit');

    //Crea nuevo caso por metodo post, lo guarda con la funcion sotre
    Route::post('/Casos/store', $controller_path . '\pages\EventController@store')->name('EventController.store');
    Route::post('/Casos/update', $controller_path . '\pages\EventController@update')->name('EventController.update');
    Route::get('/Casos/show/{event_id}', $controller_path . '\pages\EventController@show')->name('EventController.show');

    //Show para planimetria y fotografia de los hechos de pericial
    Route::get('/Casos/showNoEdit/{event_id}', $controller_path . '\pages\EventController@showNoEdit')->name('EventController.showNoEdit');

    //Ruta para generar el adelanto de novedad en archivo odt
    Route::post('/Casos/download', $controller_path . '\pages\EventController@download')->name('EventController.download');

    //Rutas para el Dpto. de DATA, a efectos de pedir o solicitar una novedad
    Route::post('/Casos/solicitar', $controller_path . '\pages\EventController@solicitar_archivar')->name('EventController.solicitar_archivar');

    //CRUD para trabajar con los tipos de hecho de Insp. Pericial
    Route::get('/TiposDeHecho', $controller_path . '\pages\pericial\TipoHechoController@index')->name('tiposdehecho');
    Route::get('/TiposDeHecho/create', $controller_path . '\pages\pericial\TipoHechoController@create')->name('TipoHechoController.create');
    Route::post('/TiposDeHecho/store', $controller_path . '\pages\pericial\TipoHechoController@store')->name('TipoHechoController.store');
    Route::get('/TiposDeHecho/show/{tipoHecho}', $controller_path . '\pages\pericial\TipoHechoController@show')->name('TipoHechoController.show');
    Route::post('/TiposDeHecho/update', $controller_path . '\pages\pericial\TipoHechoController@update')->name('TipoHechoController.update');

     //CRUD para trabajar con las dependencias policiales de Insp. Pericial
     Route::get('/UnidadesPoliciales', $controller_path . '\pages\pericial\DependenciaPolicialController@index')->name('unidadespoliciales');
     Route::get('/UnidadesPoliciales/create', $controller_path . '\pages\pericial\DependenciaPolicialController@create')->name('DependenciaPolicialController.create');
     Route::post('/UnidadesPoliciales/store', $controller_path . '\pages\pericial\DependenciaPolicialController@store')->name('DependenciaPolicialController.store');
     Route::get('/UnidadesPoliciales/show/{unidadPolicial}', $controller_path . '\pages\pericial\DependenciaPolicialController@show')->name('DependenciaPolicialController.show');
     Route::post('/UnidadesPoliciales/update', $controller_path . '\pages\pericial\DependenciaPolicialController@update')->name('DependenciaPolicialController.update');

    //CRUD para trabajar con las fiscalias de Insp. Pericial
    Route::get('/Fiscalias', $controller_path . '\pages\pericial\FiscaliaController@index')->name('fiscalias');
    Route::get('/Fiscalia/create', $controller_path . '\pages\pericial\FiscaliaController@create')->name('FiscaliaController.create');
    Route::post('/Fiscalia/store', $controller_path . '\pages\pericial\FiscaliaController@store')->name('FiscaliaController.store');
    Route::get('/Fiscalia/show/{fiscalia}', $controller_path . '\pages\pericial\FiscaliaController@show')->name('FiscaliaController.show');
    Route::post('/Fiscalia/update', $controller_path . '\pages\pericial\FiscaliaController@update')->name('FiscaliaController.update');

    //CRUD para trabajar con las intervenciones de planimetría
    //Index
    Route::get('/Inicio_Planimetria', $controller_path . '\pages\planimetria\GenericoPlanimetriaController@home')->name('Inicio_Planimetria');
    Route::get('/IntervencionesPlanimetria', $controller_path . '\pages\planimetria\GenericoPlanimetriaController@index')->name('planimetria');
    Route::get('/IntervencionesPlanimetria/create', $controller_path . '\pages\planimetria\GenericoPlanimetriaController@create')->name('GenericoPlanimetriaController.create');
    Route::post('/IntervencionesPlanimetria/store', $controller_path . '\pages\planimetria\GenericoPlanimetriaController@store')->name('GenericoPlanimetriaController.store');
    Route::get('/IntervencionesPlanimetria/show/{intervencion_id}', $controller_path . '\pages\planimetria\GenericoPlanimetriaController@show')->name('GenericoPlanimetriaController.show');
    Route::post('/IntervencionesPlanimetria/update', $controller_path . '\pages\planimetria\GenericoPlanimetriaController@update')->name('GenericoPlanimetriaController.update');
    Route::get('/IntervencionesPlanimetria/search', $controller_path . '\pages\planimetria\GenericoPlanimetriaController@searchSGSP')->name('GenericoPlanimetriaController.searchSGSP');
    Route::get('/IntervencionesPlanimetria/searchTrabajoEvacuados', $controller_path . '\pages\planimetria\GenericoPlanimetriaController@searchByTrabajoEvacuate')->name('GenericoPlanimetriaController.searchByTrabajoEvacuate');
    Route::get('/IntervencionesPlanimetria/searchTrabajoSinEfecto', $controller_path . '\pages\planimetria\GenericoPlanimetriaController@searchByTrabajoSinEffect')->name('GenericoPlanimetriaController.searchByTrabajoSinEffect');
    Route::get('/IntervencionesPlanimetria/searchTrabajoPendiente', $controller_path . '\pages\planimetria\GenericoPlanimetriaController@searchByTrabajoPendiente')->name('GenericoPlanimetriaController.searchByTrabajoPendiente');
   
    //Listado de casos para fotografía
    Route::get('/Fotografia', $controller_path . '\pages\fotografia\FotografiaController@index')->name('fotografia');
    Route::get('/Fotografia/show/{event_id}', $controller_path . '\pages\fotografia\FotografiaController@show')->name('FotografiaController.show');
    Route::post('/Fotografia/update', $controller_path . '\pages\fotografia\FotografiaController@update')->name('FotografiaController.update');
    Route::get('/Fotografia/search', $controller_path . '\pages\fotografia\FotografiaController@searchFot')->name('FotografiaController.searchFot');
    Route::get('/Fotografia/searchByPendienteFot', $controller_path . '\pages\fotografia\FotografiaController@searchByPendienteFot')->name('FotografiaController.searchByPendienteFot');

    //Route::get('/UsuariosPlanimetria', $controller_path . 'UserController@index')->name('UserController.index');
});
