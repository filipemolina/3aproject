<?php

class Peca extends Eloquent
{
	//Relacionamentos

	public function campanha()
	{
		return $this->belongsTo('Campanha');
	}

	public function tipo()
	{
		return $this->belongsTo('Tipo');
	}
}