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

Route::get('/', 'FormularioController@index');

//Acessando problemas individuais
Route::get('/problema1', 'CalculoController@listaCalculos');
Route::get('/problema2', 'BibliotecaController@index');

Route::get('/problema3', 'MatrizesController@index');
Route::get('/problema4', 'FibonacciController@index');


Route::get('/cadastroLeitor', 'LeitoresController@index');
Route::post('/cadastroLeitor', 'LeitoresController@store');


