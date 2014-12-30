<?php

class EmpresasController extends BaseController
{
	/*--------------------------------------------
	| Validação
	--------------------------------------------*/

	//Regras de Validação

	protected $regras = array(
		'razao_social' => 'required|min:5',
		'cnpj'         => 'required'
	);

	//Mensagens de erro da validação

	protected $mensagens = array(
		'razao_social.required' => 'O campo "Razão Social" é obrigatório',
		'cnpj.required'         => 'O campo "CNPJ" é obrigatório',
		'min'                   => 'O campo "Razão Social" deve ter no mínimo 5 caracteres'
	);

	/*--------------------------------------------
	| Páginas
	--------------------------------------------*/

	public function getIndex()
	{
		$empresas = Empresa::paginate(10);

		return View::make('empresas.index')->withEmpresas($empresas);
	}

	public function postIndex()
	{
		//Obter os dados do formulário
		$input = Input::get();

		//Instanciar a classe de validação
		$validator = Validator::make($input, $this->regras, $this->mensagens);

		//Testar se os dados passaram na validação

		if($validator->fails())
		{
			//Caso a validação falhe...

			return json_encode(array('erros' => true, 'mensagens' => $validator->messages()));
		}
		else
		{
			//Caso tudo tenha ido bem...

			$nova_empresa = new Empresa($input);
			$nova_empresa->save();

			return json_encode(array('erros' => false, 'empresa' => $nova_empresa->toJson()));
		}
	}
}