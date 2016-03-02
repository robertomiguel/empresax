<?php 
class generalControlador extends BaseController {

//--- Prefijos : get , post, any

    public function inicio()
    {
		$menu = menuGeneral::leer(); //DB::select($sql,array(1));
		
    	return View::make('general.inicio')->with('menu',$menu);
    }

}