<?php

class UsersController extends BaseController
{
	/*--------------------------------------------
	| Páginas
	--------------------------------------------*/

	public function getOpcoes()
	{
		return View::make('users.opcoes');
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

					return json_encode(array('erros' => false, 'mensagem' => 'Senha alterada corretamente.'));
				}
				else
				{
					return json_encode(array('erros' => true, 'mensagem' => "Digite a senha corretamente nos campos 'Nova Senha' e 'Repita a Senha'."));
				}
			}
			else
			{
				return json_encode(array('erros' => true, 'mensagem' => "Sua senha atual está incorreta."));
			}
		}
		else
		{
			return Redirect::to('/login');
		}
	}

	public function postMudarfoto()
	{
		//Obter o usuário atual

		$usuario = Auth::user();

		//Obter a foto enviada

		$foto = Input::file('foto');

		//Validar se o arquivo existe

		if($foto->isValid())
		{
			//Define que o arquivo é obrigatório e deve ser uma imagem

			$validator = Validator::make(

				array('arquivo' => $foto),
				array('arquivo' => 'required|image')

			);

			//Valida segundo as regras acima

			if($validator->passes())
			{
				//Definir o novo nome e a nova localização da foto

				$novo_nome = time() . "." . $foto->getClientOriginalExtension();
				
				$novo_caminho = base_path() . "/public/img/usuarios/";

				$caminho_completo = $novo_caminho . $novo_nome;

				//Mover a foto para a pasta de imagens de usuário e renomeá-la

				$foto->move($novo_caminho, $novo_nome);

				//Salvar a foto na tabela do usuário { Salvando a imagem com esse formato, ela pode ser obtida em uma view usando "asset($usuario->foto)" }

				$usuario->foto = "img/usuarios/" . $novo_nome;

				$usuario->save();

				return json_encode(array('erros' => false, 'mensagem' => 'Foto alterada com sucesso!', 'imagem' => asset($usuario->foto)));
			}
			else
			{
				return json_encode(array())
			}

		}
		
	}
}