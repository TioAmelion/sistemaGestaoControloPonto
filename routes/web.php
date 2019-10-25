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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/permissao', 'PermissaoController@index');

//ROTA COM PARAMETROS
//Route::get('/permissao/{nome}/{slug}', 'PermissaoController@index');

//ROTA COM NOME EXTENÇO E ACESSA-LA POR UM ÚNICO NOME
//Route::get('admin/sistema/permissao', 'PermissaoController@teste')->name('permissao');

//Route::get('/', 'InicioController@index');

//Route::group(['prefix' => 'admin', 'namespace'=> 'Admin'], function(){
	
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('inicio', 'Admin\InicioController@index')->name('inicio');
Route::get('pontoFacial', 'Admin\InicioController@index1')->name('pontoFacial');

Route::get('permissao', 'PermissaoController@index')->name('permissao');
	Route::get('permissao/create', 'PermissaoController@create')->name('criar_permissao');
	Route::get('menu', 'MenuController@index')->name('menu');
	Route::get('menu/criar', 'MenuController@create')->name('criar_menu');
	Route::post('menu', 'MenuController@store')->name('salvar');

	Route::get('rol', 'RolController@index')->name('rol');
	Route::get('rol/criar', 'RolController@create')->name('criar_rol');
	Route::post('rol', 'RolController@store')->name('salvar_rol');
	Route::get('rol/{id}/editar', 'RolController@edit')->name('editar_rol');
	Route::put('rol/{id}', 'RolController@update')->name('atualizar_rol');
	Route::delete('rol/{id}', 'RolController@destroy')->name('eliminar_rol');

	/*Registar funcionario */
	Route::get('funcionario', 'Admin\FuncionarioController@index')->name('funcionario');
	Route::get('func/criar', 'Admin\FuncionarioController@create')->name('criar_func');
	Route::get('func/{id}/editar', 'Admin\FuncionarioController@edit')->name('editar_func');
	Route::put('func/{id}', 'Admin\FuncionarioController@update')->name('atualizar_fuc');
	Route::post('func', 'Admin\FuncionarioController@store')->name('salvar_func');
	Route::delete('func/{id}', 'Admin\FuncionarioController@destroy')->name('eliminar_func');
	Route::get('funcionario/imprimir', 'Admin\FuncionarioController@imprimir_qrCode')->name('funcionario/imprimir');

	/*Registar Ponto*/
	Route::get('marcar.ponto', 'Admin\RegistrarPontoController@index')->name('marcar.ponto');
	Route::get('marcar_ponto/talatona', 'Admin\RegistrarPontoController@index1')->name('talatona');
	Route::get('marcar_ponto/{id}', 'Admin\RegistrarPontoController@store')->name('salvar.ponto');
	Route::get('falta/{id}', 'Admin\RegistrarPontoController@marcar_falta')->name('marcar_falta');

	/*Faltas*/
	Route::get('faltas', 'Admin\JustificarFaltasController@index')->name('justificar_faltas');
	Route::get('faltas/{id}', 'Admin\JustificarFaltasController@edit')->name('justificativo');
	Route::put('faltas/{id}', 'Admin\JustificarFaltasController@update')->name('atualizar_faltas');

	/*Imprimir Ponto*/
	Route::get('imprimir', 'Admin\RegistrarPontoController@imprimir')->name('imprimir');
	Route::get('export', 'Admin\RegistrarPontoController@export')->name('export');

	/* Imprimir ponto Individual */
	Route::get('imprimir_ponto/{$id}', 'Admin\RegistrarPontoController@ponto_individual')->name('imprimir_ponto');
	Route::get('export_individual', 'Admin\RegistrarPontoController@export')->name('export_p');
	

	Route::get('events', 'Admin\EventController@index')->name('events');
	Route::post('add_events', 'Admin\EventController@store')->name('add_events');