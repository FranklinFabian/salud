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
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

/*Rutas de autenticación*/
Route::namespace('Autenticacion')->name('autenticacion.')->group(function(){
    //Formulario de autenticación
    Route::get('/', 'LoginController@loginForm')->name('loginForm');
    //Función para inicio de sesión
    Route::post('/login', 'LoginController@login')->name('login');
    //Función para cerrar sesión
    Route::post('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware' => ['auth']], function() {
    /*Rutas de usuario administrador*/
    Route::namespace('Administracion')->prefix('administracion')->name('administracion.')->middleware('role:administrador')->group(function(){

        Route::get('/dashboard', 'PagesController@index')->name('dashboard');
        Route::get('/sala_situacional', 'PagesController@sala_situacional')->name('sala_situacional');
        Route::get('/usuario', 'UsuarioController@index')->name('usuario');
        Route::get('/usuario/tab/{param1}/{param2}', 'UsuarioController@tab')->name('tab');
        Route::get('/usuario/general/{param1}/{param2}', 'GeneralController@index')->name('general');

        Route::resource('/usuario/modulo', 'ModuloController', ['except' => ['show', 'create']]);

        Route::get('/usuario/modulo/{param1}/{param2}', 'ModuloController@index')->name('modulo');
        Route::get('/usuario/modulo/datatable/{param1}/{param2}', 'ModuloController@dataTable')->name('modulodatatable');
        Route::get('/usuario/modulo/{param1}/{param2}/edit', 'ModuloController@edit');

        Route::get('/usuario/submodulo/{param1}/{param2}', 'SubmoduloController@index')->name('submodulo');
        Route::get('/usuario/submodulo/datatable/{param1}/{param2}', 'SubmoduloController@dataTable')->name('submodulodatatable');

        Route::resource('/usuario/general', 'GeneralController', ['except' => ['show', 'create']]);

        //TEST VIEW
        Route::get('/usuario/vista', 'GeneralController@vista')->name('vista');
    });



    /*Rutas de modulo Rhd*/
    Route::namespace('Rhd')->prefix('rhd')->name('rhd.')->middleware(
        'role:rhd')->group(function(){
        Route::get('/item', 'ItemController@index')->name('item');
        Route::get('/item/tab/{param1}/{param2}', 'ItemController@tab')->name('tab');
        Route::get('/item/ficha/{param1}', 'ItemController@ficha');

        //Formulario General
        Route::resource('/item/general', 'GeneralController', ['except' => ['show', 'create']]);
        Route::get('/item/general/{param1}/{param2}', 'GeneralController@index')->name('general');
        Route::get('/item/{param1}/establecimiento', 'GeneralController@establecimiento');

        //Formulario de Atención de Pacientes COVID 19
        Route::resource('/item/atencionpaciente', 'AtencionPacienteController', ['except' => ['show', 'create']]);
        Route::get('/item/atencionpaciente/{param1}/{param2}', 'AtencionPacienteController@index')->name('atencionpaciente');

        //Formulario de Insumos Disponibles
        Route::resource('/item/insumodisponible', 'InsumoDisponibleController', ['except' => ['show', 'create']]);
        Route::get('/item/insumodisponible/{param1}/{param2}', 'InsumoDisponibleController@index')->name('insumodisponible');

    });


    /*Rutas de modulo Parque Informático*/
    Route::namespace('ParqueInformatico')->prefix('parqueinformatico')->name('parqueinformatico.')->middleware(
        'role:parque_informatico_lista')->group(function() {
        Route::get('/item', 'ItemController@index')->name('item');
        Route::get('/item/tab/{param1}/{param2}', 'ItemController@tab')->name('tab');
        Route::get('/item/ficha/{param1}', 'ItemController@ficha');

        //Formulario General
        Route::resource('/item/general', 'GeneralController', ['except' => ['show', 'create']]);
        Route::get('/item/general/{param1}/{param2}', 'GeneralController@index')->name('general');
        Route::get('/item/{param1}/establecimiento', 'GeneralController@establecimiento');

        //Formulario de Accesorios
        Route::resource('/item/lista', 'ListaController', ['except' => ['show', 'create']]);
        Route::get('/item/lista/{param1}/{param2}', 'ListaController@index')->name('lista');
        Route::get('/item/lista/datatable/{param1}/{param2}', 'ListaController@dataTable')->name('listadatatable');
        Route::get('/item/lista/{param1}/{param2}/edit', 'ListaController@edit');


    });


    /*Rutas de modulo Banco de Oxigeno*/
    Route::namespace('BancoOxigeno')->prefix('bancooxigeno')->name('bancooxigeno.')->middleware(
        'role:banco_oxigeno')->group(function(){
        Route::get('/item', 'ItemController@index')->name('item');
        Route::get('/item/tab/{param1}/{param2}', 'ItemController@tab')->name('tab');
        Route::get('/item/ficha/{param1}', 'ItemController@ficha');

        //Formulario General
        Route::resource('/item/general', 'GeneralController', ['except' => ['show', 'create']]);
        Route::get('/item/general/{param1}/{param2}', 'GeneralController@index')->name('general');
        Route::get('/item/{param1}/establecimiento', 'GeneralController@establecimiento');

        //Formulario de Recolección de Datos sobre la Generación de Oxígeno
        Route::resource('/item/generacionoxigeno', 'GeneracionOxigenoController', ['except' => ['show', 'create']]);
        Route::get('/item/generacionoxigeno/{param1}/{param2}', 'GeneracionOxigenoController@index')->name('generacionoxigeno');

        //Formulario de Recolección de Datos sobre Vacunación

        Route::resource('/item/vacunacion', 'VacunacionController', ['except' => ['show', 'create']]);
        Route::get('/item/vacunacion/{param1}/{param2}', 'VacunacionController@index')->name('vacunacion');
        Route::get('/item/vacunaciondatatable/{param1}', 'VacunacionController@dataTable')->name('vacunaciondatatable');
        Route::get('/item/vacunacion/{param1}/{param2}/{param3}/edit', 'VacunacionController@edit');


    });


    /*Rutas de Módulo de Sala Situacional*/
    Route::namespace('SalaSituacional')->prefix('salasituacional')->name('salasituacional.')->middleware(
        'role:sala_situacional')->group(function(){
        Route::get('/item', 'ItemController@index')->name('item');
        Route::get('/item/tab/{param1}/{param2}', 'ItemController@tab')->name('tab');
        Route::get('/item/ficha/{param1}', 'ItemController@ficha');

        //Formulario General
        Route::resource('/item/general', 'GeneralController', ['except' => ['show', 'create']]);

        /*Route::get('/item/general', 'GeneralController@index')->name('general');
        Route::get('/general/rnve', 'GeneralController@rnve');
        Route::get('/general/sive', 'GeneralController@sive');
        Route::get('/general/rhd', 'GeneralController@rhd');*/

        //REPORTES GENERALES
        Route::get('/item/general', 'GeneralController@index')->name('general');
        Route::get('/item/general/grafico_rhd/', 'GeneralController@grafico_rhd');
        Route::get('/item/general/grafico_rhd_utis/', 'GeneralController@grafico_rhd_utis');
        Route::get('/item/general/grafico_banco_oxigeno/', 'GeneralController@grafico_banco_oxigeno');
        Route::get('/item/general/grafico_sive/', 'GeneralController@grafico_sive');
        Route::get('/item/general/grafico_rnve/', 'GeneralController@grafico_rnve');
        Route::get('/item/general/grafico_sive_positivos/', 'GeneralController@grafico_sive_positivos');

        //BANCO DE OXIGENO
        Route::get('/item/banco_oxigeno', 'BancoOxigenoController@index')->name('banco_oxigeno');
        Route::get('/item/banco_oxigeno/grafico/{param1}/{param2}', 'BancoOxigenoController@grafico');

        //RHD
        Route::get('/item/rhd', 'RhdController@index')->name('rhd');
        Route::get('/item/rhd/grafico/{param1}/{param2}', 'RhdController@grafico');

        //SIVE
        Route::get('/item/sive', 'SiveController@index')->name('sive');
        Route::get('/item/sive/grafico', 'SiveController@grafico');

        //RNV
        Route::get('/item/rnv', 'RnvController@index')->name('rnv');
        Route::get('/item/rnv/grafico/{param1}', 'RnvController@grafico');

        //RNV
        Route::get('/item/mapa', 'MapaController@index')->name('mapa');
        Route::get('/item/mapa/grafico/{param1}', 'MapaController@grafico');

        //Tablas
        Route::get('/item/tabla', 'TablaController@index')->name('tabla');
        //Route::get('/item/rnv/tabla/{param1}', 'TablaController@grafico');

        //Reporte Covid PDF
        Route::get('/item/resumenpdf', 'ReporteController@resumenpdf')->name('resumenpdf');

        Route::get('/item/score', 'ScoreController@index')->name('score');

    });



});

