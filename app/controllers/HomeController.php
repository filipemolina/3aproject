<?php

class HomeController extends BaseController {

	/*--------------------------------------------
	| Páginas
	--------------------------------------------*/

	//Index

	public function getIndex()
	{
		//Determinar se o usuário está logado

		if(Auth::check())
		{
			//Redireciona para a tela de campanhas
			return Redirect::to('/campanhas');
		}
		else
		{
			//Redireciona para a tela de login
			return Redirect::to('/login');
		}
	}

	//Mostrar o Formulário de Login

	public function getLogin()
	{
		//Testar se o usuário não está logado
		if(Auth::guest())
			return View::make('home.login');
		else
			return Redirect::to('/');
	}

	/*--------------------------------------------
	| Login - Logout
	--------------------------------------------*/

	//Tentar Logar o Usuário

	public function postLogin()
	{
		//Obter as credenciais fornecidas pelo usuário

		$email = Input::get('email');
		$senha = Input::get('password');

		//Tentar autenticar o usuário

		if(Auth::attempt( array('email' => $email, 'password' => $senha)) )
		{
			return Redirect::to('/');
		}
		else
		{
			return Redirect::to('/login');
		}
	}

	//Deslogar o usuário

	public function getLogout()
	{
		Auth::logout();

		return Redirect::to('/login');
	}

	/*--------------------------------------------
	| Helpers
	--------------------------------------------*/

}
