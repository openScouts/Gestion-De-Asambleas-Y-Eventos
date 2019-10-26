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
    //return view('welcome');
});

Auth::routes();

Route::get('/', 'InicioController@index')->name('home');
Route::get('/home', function () {
    return redirect('/');
});


Route::get('/nomina', 'NominaController@index');
Route::get('/nomina/organismos', 'NominaController@organismos');
Route::get('/nomina/pdf/{id}', 'NominaController@generaPDF');
Route::get('/nomina/historico/{documento}', 'NominaController@historico');


Route::get('/acreditaciones', 'AcreditacionesController@index');
Route::post('/acreditaciones', 'AcreditacionesController@estado');


Route::get('/asamblea', 'AsambleaController@index');
Route::post('/asamblea', 'AsambleaController@estado');
Route::get('/asamblea/listado', 'AsambleaController@listado');
Route::get('/asamblea/historico/{id}', 'AsambleaController@historico');
Route::get('/asamblea/oradores', 'OradoresController@index');
Route::post('/asamblea/oradores', 'OradoresController@alta');
Route::get('/asamblea/oradores/baja/{id}', 'OradoresController@baja');

Route::get('/asamblea/ausente_masivo', 'AsambleaController@ausente_masivo');
