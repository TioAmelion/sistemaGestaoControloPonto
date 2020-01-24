<?php

//Route::group(['prefix' => 'admin', 'namespace'=> 'Admin'], function(){});

//Rota padrao do laravel
Route::get('/', function () {
	return view('welcome');
});

//Usuarios, rota gerada pelo laravel com comando make:auth
Auth::routes();

//Inicio da App
Route::get('/home', 'HomeController@index')->name('home');
Route::get('inicio', 'Admin\InicioController@index')->name('inicio');

//Permissao para usuarios
Route::get('usuarios', 'Auth\UsuarioController@index')->name('usuarios');
Route::get('usuarios/{id}/editar', 'Auth\UsuarioController@edit')->name('usuarios_edit');
Route::put('usuarios_update/{id}', 'Auth\UsuarioController@update')->name('usuarios_update');

//Registar funcionario
Route::get('funcionario', 'Admin\FuncionarioController@index')->name('funcionario');
Route::get('func/criar', 'Admin\FuncionarioController@create')->name('criar_func');
Route::get('func/{id}/editar', 'Admin\FuncionarioController@edit')->name('editar_func');
Route::put('func/{id}', 'Admin\FuncionarioController@update')->name('atualizar_fuc');
Route::post('func', 'Admin\FuncionarioController@store')->name('salvar_func');
Route::delete('func/{id}', 'Admin\FuncionarioController@destroy')->name('eliminar_func');
Route::get('funcionario/imprimir', 'Admin\FuncionarioController@imprimir_qrCode')->name('funcionario/imprimir');

//Registar Ponto
Route::get('marcar.ponto', 'Admin\RegistrarPontoController@index')->name('marcar.ponto');
Route::get('marcar_ponto/talatona', 'Admin\RegistrarPontoController@index1')->name('talatona');
Route::get('marcar_ponto/{id}', 'Admin\RegistrarPontoController@store')->name('salvar.ponto');
Route::get('falta/{id}', 'Admin\RegistrarPontoController@marcar_falta')->name('marcar_falta');

//Faltas//
Route::get('faltas', 'Admin\JustificarFaltasController@index')->name('justificar_faltas');
Route::get('faltas/{id}', 'Admin\JustificarFaltasController@edit')->name('justificativo');
Route::put('faltas/{id}', 'Admin\JustificarFaltasController@update')->name('atualizar_faltas');

//Imprimir Ponto
Route::get('imprimir', 'Admin\RegistrarPontoController@imprimir')->name('imprimir');
Route::get('export', 'Admin\RegistrarPontoController@export')->name('export');

// Imprimir ponto Individual 
Route::get('imprimir_ponto', 'Admin\PontoIndividualController@ponto_individual')->name('imprimir_ponto');
Route::get('export_individual/{id}', 'Admin\PontoIndividualController@imprimir')->name('export_individual');
	
//Plano de ferias
Route::get('events', 'Admin\EventController@index')->name('events');
Route::get('ferias', 'Admin\EventController@mapa_ferias')->name('ferias');
Route::post('add_events', 'Admin\EventController@store')->name('add_events');

// Marcar ponto Qr Code
Route::get('Marcar_ponto', 'PontoQrCodeController@index')->name('pontoQr');
Route::post('scanQr', 'PontoQrCodeController@checkUser')->name('scanQr');