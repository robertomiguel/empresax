<?php

class InicioControlador extends BaseController {

	public function index()
	{	
		$autos = Articulo::confoto(1);
		$marcas = Marca::todas();
		$rubros = Rubro::todos();
		return View::make('portal.portal')->with('marcas',$marcas)
										  ->with('rubros',$rubros)
										  ->with('autos',$autos);
	}

	public function marcalistado(){
		$marca = Input::get('marca');
		$autos = Articulo::marca($marca);
		return View::make('portal.verlista')->with('autos',$autos);
	}

	public function rubrolistado(){
		$rubro = Input::get('rubro');
		$autos = Articulo::rubro($rubro);
		return View::make('portal.verlista')->with('autos',$autos);
	}

	public function laempresa(){
		return View::make('portal.laempresa');
	}

	public function plan84(){
		return View::make('portal.plan84');
	}

	public function grabarconsulta() {
		$nombre 	= Input::get('nombre');
		$tel 		= Input::get('tel');
		$localidad 	= Input::get('localidad');
		$email 		= Input::get('email');
		$consulta 	= Input::get('consulta');
		$ip 		= '0.0.0.0';

		$grabar = Consulta::grabar($nombre, $tel, $localidad, $email, $consulta, $ip);

		return 'r:'.$grabar;
	}
}
