<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Controller@index');
Route::get('/pessoas/listar', 'PessoaController@listar');

Route::get('/pessoas/cadastrar', 'PessoaController@cadastrar');
Route::post('/pessoas/cadastrar', 'PessoaController@processarCadastro');

Route::get('pessoas/excluir/{id}', 'PessoaController@excluir');
Route::post('pessoas/excluir/{id}', 'PessoaController@processarExclusao');

