<?php 
class usuarioControlador extends BaseController
{
//--- Prefijos : get , post, any

    public function index()
    {
    	return View::make('usuario.inicio');
    }

    public function verplan()
    {
    	$id = Auth::user()->id;
    	$cliente = Suscriptor::datosCliente($id);
    	$suscripciones = Suscripcion::suscripciones($id);

    	return View::make('usuario.verplan')->with('cliente',$cliente)
    										->with('suscripciones',$suscripciones);
    }
}