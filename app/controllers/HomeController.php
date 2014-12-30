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
	| Configurações
	--------------------------------------------*/

	public function postMudarsenha()
	{
		if(Auth::check())
		{
			//Obter o usuário atual

			$usuario = Auth::user();

			//Obter os dados do usuário

			$input = Input::get();

			//Verificar a senha atual do usuário

			if ( Hash::check( $input['atual'], $usuario->password ) )
			{
				//Verificar se a senha foi digitada igualmente nos dois campos

				if ( ($input['nova'] === $input['repetida']) && ( $input['nova'] != '' ) )
				{
					//Alterar a senha do usuário

					$usuario->password = Hash::make($input['nova']);
					$usuario->save();

					return Redirect::to('/');
				}
				else
				{
					echo "As senhas são diferentes";
				}
			}
			else
			{
				echo "Senha Não confere";
			}
		}
		else
		{
			return Redirect::to('/login');
		}
	}

	/*--------------------------------------------
	| Helpers
	--------------------------------------------*/

}
