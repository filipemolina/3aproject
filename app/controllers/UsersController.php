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
}