<?php

class menuGeneral extends Eloquent {

	protected $table = 'menu_general';
	protected $primaryKey = 'id';
	public $timestamps = false;

static public function leer(){
		
		$sql =    "SELECT *
					 FROM menu_general";

	$datos = DB::select($sql);

	return $datos;
	}
}