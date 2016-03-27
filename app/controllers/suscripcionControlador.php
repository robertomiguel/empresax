<?php

class suscripcionControlador extends BaseController {

	public function listado(){

		return json_encode(Suscripcion::listado());
	}

	public function informe()
	{
		$pass = Input::get('p');
		if ($pass=='Roberts!!') {
			return File::get(app_path().'/views/portal/home.html');
		}
		return;
	}

}


