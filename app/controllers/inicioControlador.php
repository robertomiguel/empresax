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

}
