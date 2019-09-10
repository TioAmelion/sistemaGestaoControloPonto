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
	Route::get('menu/create', 'MenuController@create')->name('criar_menu');
	Route::post('menu', 'MenuController@store')->name('salvar');

});