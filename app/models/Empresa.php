<?php

class Empresa extends Eloquent
{
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