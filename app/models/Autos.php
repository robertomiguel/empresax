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

	static public function listar($marcas)
	{
		$sql = "
				SELECT * FROM autos
				WHERE marca IN ($marcas)
				ORDER BY marca, modelo, detalle
		";

		$datos = DB::select($sql);
		return $datos;
	}
}