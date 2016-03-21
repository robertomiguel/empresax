<?php
class ParametrosListados extends Eloquent {

	protected $table 		= 'parametros_listados';
	protected $primaryKey 	= 'id';
	public $timestamps 		= false;

	static public function todos()
	{
		$sql = "SELECT incremento_nominal,	gastos_admin,	adjudica,	plan_cuotas,	dolar, incremento_fabrica
				  FROM parametros_listados LIMIT 1";
				  
		$datos = DB::select($sql);
		return $datos;
	}

}