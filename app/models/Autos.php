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
		$parm = ParametrosListados::todos();
		$incr_nominal = $parm[0]->incremento_nominal;
		$incr_fabrica = $parm[0]->incremento_fabrica;
		$cuotas		= $parm[0]->plan_cuotas;
		$sql = "
				SELECT id, marca, modelo, detalle,
						(a0km * $incr_fabrica) AS costo,
						((a0km * $incr_fabrica) * $incr_nominal) AS nominal,
						(((a0km * $incr_fabrica) * $incr_nominal) / $cuotas) AS cuota ,
						moneda
				 FROM autos
				WHERE marca IN ($marcas) AND a0km > 0
				ORDER BY marca, modelo, a0km
		";

		$datos = DB::select($sql);
		return $datos;
	}

}