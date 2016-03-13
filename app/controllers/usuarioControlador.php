<?php 
class usuarioControlador extends BaseController {

//--- Prefijos : get , post, any

    public function index()
    {
    	return View::make('usuario.inicio');
    }

}