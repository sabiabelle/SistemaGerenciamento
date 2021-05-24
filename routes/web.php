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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome', 'welcomeController@index')->name('welcome');
Route::get('/', 'welcomeController@index')->name('welcome');


/*------- ROTAS Usuário----*/
Route::get('/usuarios/','UsuariosController@index')->name('usuarios.index');
Route::get('/usuarios/create','UsuariosController@create')->name('usuarios.create');
Route::post('/usuarios/store','UsuariosController@store')->name('usuarios.store');
Route::get('/usuarios/{id}/edit','UsuariosController@edit')->name('usuarios.edit');
Route::post('/usuarios/{id}/update','UsuariosController@update')->name('usuarios.update');
Route::get('/usuarios/{id}/destroy','UsuariosController@destroy')->name('usuarios.destroy');

/*------- ROTAS Clientes----*/
Route::get('/clientes/','ClienteController@index')->name('clientes.index');
Route::get('/clientes/create','ClienteController@create')->name('clientes.create');
Route::get('/clientes/{id}/edit', 'ClienteController@edit')->name('clientes.edit');
Route::get('/clientes/show', 'ClienteController@show')->name('clientes.show');
Route::post('/clientes/store', 'ClienteController@store')->name('clientes.store');
Route::post('/clientes/{id}/update', 'ClienteController@update')->name('clientes.update');
Route::get('/clientes/{id}/destroy', 'ClienteController@destroy')->name('clientes.destroy');

/*------- ROTAS Servicos----*/
Route::get('/servicos/','ServicosController@index')->name('servicos.index');
Route::get('/servicos/create','ServicosController@create')->name('servicos.create');
Route::get('/servicos/{id}/edit', 'ServicosController@edit')->name('servicos.edit');
Route::post('/servicos/store', 'ServicosController@store')->name('servicos.store');
Route::post('/servicos/{id}/update', 'ServicosController@update')->name('servicos.update');
Route::get('/servicos/{id}/destroy', 'ServicosController@destroy')->name('servicos.destroy');

/*------- ROTAS Atendimentos----*/
Route::get('/atendimentos/','AtendimentosController@index')->name('atendimentos.index');
Route::get('/atendimentos/{id}/create','AtendimentosController@create')->name('atendimentos.create');
Route::get('/atendimentos/{id}/edit', 'AtendimentosController@edit')->name('atendimentos.edit');
Route::post('/atendimentos/store', 'AtendimentosController@store')->name('atendimentos.store');
Route::post('/atendimentos/{id}/update', 'AtendimentosController@update')->name('atendimentos.update');
Route::get('/atendimentos/{id}/destroy', 'AtendimentosController@destroy')->name('atendimentos.destroy');
Route::get('/atendimentos/{id}/show', 'AtendimentosController@show')->name('atendimentos.show');
Route::get('/atendimentos/registros', 'AtendimentosController@registros')->name('atendimentos.registros');
Route::get('/atendimentos/entradas', 'AtendimentosController@entradas')->name('atendimentos.entradas');
Route::get('/atendimentos/{id}/nota_fiscal', 'AtendimentosController@nota_fiscal')->name('atendimentos.nota_fiscal');

/*------- ROTAS Saidas----*/
Route::get('/saidas/','SaidasController@index')->name('saidas.index');
Route::get('/saidas/create','SaidasController@create')->name('saidas.create');
Route::get('/saidas/inicial','SaidasController@inicial')->name('saidas.inicial');
Route::post('/saidas/store','SaidasController@store')->name('saidas.store');
Route::get('/saidas/{id}/edit','SaidasController@edit')->name('saidas.edit');
Route::post('/saidas/{id}/update','SaidasController@update')->name('saidas.update');

/*------- ROTAS Caixa----*/
Route::get('/caixa/','CaixaController@index')->name('caixa.index');
Route::post('/caixa/registrar_fluxo','CaixaController@registrar_fluxo')->name('caixa.registrar_fluxo');
Route::get('/caixa/fluxo','CaixaController@fluxo')->name('caixa.fluxo');
Route::get('/caixa/historico','CaixaController@historico')->name('caixa.historico');
Route::post('/caixa/store','CaixaController@store')->name('caixa.store');