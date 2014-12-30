<?php

class Empresa extends Eloquent
{
	//Campos que podem ser preenchidos via formulário

	protected $fillable = array('razao_social', 'cnpj');

	//Relacionamentos

	public function users()
	{
		return $this->hasMany('User');
	}

	public function campanhas()
	{
		return $this->hasMany('Campanha');
	}
}