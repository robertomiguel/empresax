<?php

class agricolaControlador extends BaseController {

	public function index()
	{
		//return View::make('portal.home.html');
		return File::get(app_path().'/views/portal/home.html');
	}

	public function clientes()
	{
		$datos = Suscriptor::listaClientes();
		header('Content-Type: application/json');
		return json_encode($datos);
	}

	public function listado()
	{
		//$datos = Agricola::listado();

		return json_encode(Agricola::listado());
	}
}