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

	static public function listavendedor($marcas)
	{
		$sql = "
				SELECT id, marca, modelo, detalle, a0km, (a0km * 1.3) AS nominal, ((a0km * 1.3) / 84) AS cuota , moneda FROM autos
				WHERE marca IN ($marcas) AND a0km > 0
				ORDER BY marca, modelo, detalle
		";

		$datos = DB::select($sql);
		return $datos;
	}

}