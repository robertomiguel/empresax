<?php 
class adminControlador extends BaseController {

//--- Prefijos : get , post, any

    public function inicio()
    {
    	return View::make('admin.inicio');
    }

    public function crearlistado()
    {
    	$marcas = Autos::marcas();
    	return View::make('admin.crearlistado')->with('marcas',$marcas);
    }

    public function verlistadoautos(){
    	$lista = Input::get('lista');

    	return $lista;
    }
}