<?php

class Campanha extends Eloquent
{
	//Campos que podem ser preenchidos via formulário

	protected $fillable = array('nome', 'data_inicial', 'data_final', 'empresa_id');

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