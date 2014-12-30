<?php

class CampanhasController extends BaseController
{
	/*--------------------------------------------
	| Validação
	--------------------------------------------*/

	//Regras de Validação

	protected $regras = array(
		'nome'         => 'required|min:5',
		'data_inicial' => 'required|date_format:d/m/Y',
		'data_final'   => 'required|date_format:d/m/Y',
		'empresa_id'      => 'required'
	);

	//Mensagens de erro da validação

	protected $mensagens = array(
		'required' => 'O campo ":attribute" é obrigatório',
		'min'      => 'O campo ":attribute" deve ter no mínimo 5 caracteres',
		'date_format' => 'Digite as datas no formato dd/mm/aaaa'
	);

	/*--------------------------------------------
	| Actions
	--------------------------------------------*/

	//Get para "/campanhas"

	public function getIndex()
	{
		$campanhas = Campanha::paginate(10);

		return json_encode($campanhas);
	}

	//Post para "/campanhas"

	public function postIndex()
	{
		$input = Input::get();

		$validador = Validator::make($input, $this->regras, $this->mensagens);

		if($validador->fails())
		{
			//Caso haja algum erro de validação, retornar as mensagens
			return json_encode(array('erros' => true, 'mensagens' => $validador->messages()));
		}
		else
		{
			//Formatar as datas

			$inicial = implode('-',array_reverse(explode('/', Input::get('data_inicial'))));
			$final   = implode('-',array_reverse(explode('/', Input::get('data_final'))));
			
			//Criar a nova campanha
			$campanha = new Campanha();

			//Setar os valores
			$campanha->nome = Input::get('nome');
			$campanha->data_inicial = $inicial;
			$campanha->data_final = $final;
			$campanha->empresa_id = Input::get('empresa_id');

			//Salvar
			$campanha->save();

			//Retornar sem erros
			return json_encode(array('erros' => false));
		}

	}

	//Get para "/campanhas/paginacao"

	public function getPaginacao()
	{
		$campanhas = Campanha::paginate(10);

		return $campanhas->links();
	}
}