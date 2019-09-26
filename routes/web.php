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

Route::get('/', 'InicioController@index');

Route::group(['prefix' => 'admin', 'namespace'=> 'Admin'], function(){
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
	Route::get('func', 'FuncionarioController@index')->name('funcionario');
	Route::get('func/criar', 'FuncionarioController@create')->name('criar_func');
	Route::get('func/{id}/editar', 'FuncionarioController@edit')->name('editar_func');
	Route::put('func/{id}', 'FuncionarioController@update')->name('atualizar_fuc');
	Route::post('func', 'FuncionarioController@store')->name('salvar_func');
	Route::delete('func/{id}', 'FuncionarioController@destroy')->name('eliminar_func');

	/*Registar Ponto*/
	Route::get('marcar_ponto', 'RegistrarPontoController@index')->name('marcar.ponto');
	Route::get('marcar_ponto/talatona', 'RegistrarPontoController@index1')->name('talatona');
	Route::get('marcar_ponto/{id}', 'RegistrarPontoController@store')->name('salvar.ponto');
	Route::get('falta/{id}', 'RegistrarPontoController@marcar_falta')->name('marcar_falta');

	/*Faltas*/
	Route::get('faltas', 'JustificarFaltasController@index')->name('justificar_faltas');
	Route::get('faltas/{id}', 'JustificarFaltasController@edit')->name('justificativo');
	Route::put('faltas/{id}', 'JustificarFaltasController@update')->name('atualizar_faltas');
});