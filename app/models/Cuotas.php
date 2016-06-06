<?php

class cuotas extends Eloquent {

	protected $connection   = 'universal';
	protected $table 		= 'cuotas';
	protected $primaryKey 	= 'id';
	public 	  $timestamps	= false;

	static public function verCuotas($id)
	{
		$sql = "
			SELECT 
		";

		$datos = DB::connection('universal')->select($sql);

		return $datos;
	}
}