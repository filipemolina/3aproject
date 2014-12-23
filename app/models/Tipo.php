<?php

class Tipo extends Eloquent
{
	//Relacionamentos

	public function pecas()
	{
		return $this->hasMany('Peca');
	}
}