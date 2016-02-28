<?php 
class adminControlador extends BaseController {

//--- Prefijos : get , post, any

    public function inicio()
    {
    	//$sql = 'SELECT * FROM menu_general WHERE visible = ?';
		$menu = menuGeneral::leer(); //DB::select($sql,array(1));
		return json_encode($menu);
    	return View::make('admin.inicio')->with('menu',$menu);
    }

}