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

Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

Route::get('/produtos', 'ProdutosController@listar');
Route::get('/produtos/apiListar', 'ProdutosController@apiListar');
Route::get('/produtos/visualizar', 'ProdutosController@visualizar');
Route::get('/produtos/adicionar', 'ProdutosController@adicionar');
Route::post('/produtos/inserir', 'ProdutosController@inserir');