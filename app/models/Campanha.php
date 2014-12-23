<?php

class Campanha extends Eloquent
{
	//Relacionamentos

	public function pecas()
	{
		return $this->hasMany('Peca');
	}

	public function empresa()
	{
		return $this->belongsTo('Empresa');
	}
}