<?php
class Autos extends Eloquent {

	protected $table 		= 'autos';
	protected $primaryKey 	= 'id';
	public $timestamps 		= false;

	static public function marcas()
	{
		$sql = "SELECT id, marca
				  FROM autos
 				 GROUP BY marca";
		$datos = DB::select($sql);
		return $datos;
	}
}