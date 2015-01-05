<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Agrupar todas as rotas que requerem autenticação

Route::group(array('before' => 'auth'), function(){

	Route::controller('/campanhas', 'CampanhasController');
	Route::controller('/empresas', 'EmpresasController');
	Route::controller('/usuarios', 'UsersController');

});

//Rota padrão que não necessita de autenticação

Route::controller('/', 'HomeController');
