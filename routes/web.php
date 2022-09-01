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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'WelcomeController@index');
Route::get('consultas', 'WelcomeController@irconsultas');

// Rutas de Evento 
Route::get('evento', 'EventoController@mostrar');
Route::POST('addEvento', 'EventoController@addEvento');
Route::POST('editEvento', 'EventoController@editEvento');
Route::POST('deleteEvento', 'EventoController@deleteEvento');
//
//Rutas Informacion 
Route::get('info', 'InformacionController@mostrar');
Route::POST('addInfo', 'InformacionController@addinfo');
Route::POST('editInfo', 'InformacionController@editInfo');

//Rutas de Grupos
Route::get('grupos', 'GruposController@mostrar');
Route::POST('addGrupo', 'GruposController@addGrupo');
Route::POST('editGrupo', 'GruposController@editGrupo');
Route::POST('deleteGrupo', 'GruposController@deleteGrupo');

//Rutas de Bautizos
Route::get('bautizo', 'BautizosController@index')->name('bautizo');
Route::post('guardarbautizo', 'BautizosController@GuardarBautizo');
Route::get('bautizos', 'BautizosController@mostrarButizos')->name('bautizos');
Route::get('editarbautizos/{slug}', 'BautizosController@BuscarBautizo')->name('editarbautizos');
Route::POST('/actubau', 'BautizosController@ActualizarBautizo');
//Route::get('actabautizo/{id}', 'BautizosController@actabautizo');

//Rutas comumion
Route::get('registarcomunion1/{slug}', 'ComunionController@registrar1')->name('registarcomunion1');
Route::post('/guardarcomu1', 'ComunionController@GuardarComunion1')->name('/guardarcomu1');
Route::get('registarcomunion2', 'ComunionController@registrar2')->name('registarcomunion2');
Route::post('/guardarcomu2', 'ComunionController@GuardarComunion2')->name('/guardarcomu2');
Route::get('comuniones', 'ComunionController@mostrarcomunion')->name('comuniones');
Route::get('editarcomunion/{slug}', 'ComunionController@Buscarcomunion')->name('editarcomunion');
Route::POST('/actucomu', 'ComunionController@ActualizarComunion');
//

//Rutas Confirma
Route::get('registarconfirma1/{slug}', 'ConfirmaController@registrar1')->name('registarconfirma1');
Route::post('/guardarconfirma1', 'ConfirmaController@GuardarConfirma1')->name('/guardarconfirma1');
Route::get('registarconfirma2', 'ConfirmaController@registrar2')->name('registarconfirma2');
Route::post('/guardarconfirma2', 'ConfirmaController@GuardarConfirma2')->name('/guardarconfirma2');
Route::get('confirmas', 'ConfirmaController@mostrarconfirmas')->name('confirmas');
Route::get('editarconfirma/{slug}', 'ConfirmaController@Buscarconfirma')->name('editarconfirma');
Route::POST('/actuconfirma', 'ConfirmaController@ActualizarConfirma');
//

//Rutas Matrimonio
Route::get('registarmatrimonio', 'MatrimonioController@index')->name('registarmatrimonio');
Route::post('guardarmatriminio', 'MatrimonioController@GuardarMatrimonio')->name('guardarmatriminio');
Route::get('matrimonios', 'MatrimonioController@mostrarmatrimonios')->name('matrimonios');
Route::POST('mostrartestigosypadres', 'MatrimonioController@obternertestigosypadres');
Route::get('editarmatrimonio/{slug}', 'MatrimonioController@BuscarMatrimonio')->name('editarmatrimonio');
Route::POST('/actucmatrimonio', 'MatrimonioController@ActualizarMatrimonio');
//

//Rutas Consultas
Route::POST('busquedabautizo', 'ConsultasController@ConsultaBautizo');
Route::POST('busquedacomunion', 'ConsultasController@ConsultaComunion');
Route::POST('busquedaconfirma', 'ConsultasController@ConsultaConfirma');
Route::POST('busquedamatrimonio', 'ConsultasController@ConsultaMatrimonio');

//Reportes
Route::get('actabautizo/{slug}', 'BautizosController@actabautizo')->name('actabautizo');
Route::get('actacomunion/{slug}', 'ComunionController@actacomunion')->name('actacomunion');
Route::get('actacconfirma/{slug}', 'ConfirmaController@actaconfirm')->name('actacconfirma');
Route::get('actamatrimonio/{slug}', 'MatrimonioController@actamatrimonio')->name('actamatrimonio');

//
Route::get('existecomunion/{id}', 'ComunionController@siexiste');
Route::get('existeconfirma/{id}', 'ConfirmaController@siexiste');
//

Route::POST('mostrarpadrinos', 'PadrinosController@obternerpadrinos');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
