<?php

class suscripcion extends Eloquent {

	protected $connection   = 'universal';
	protected $table 		= 'suscripcion';
	protected $primaryKey 	= 'id';
	public 	  $timestamps	= false;

	static public function suscripciones($id)
	{
		$sql = "
				SELECT 	suscripcion.fecha_alta,	
						suscripcion.nro, 
						suscripcion.plan, 
						cant_cuotas,
						valor_cuota,

						cuota.nro_cuota AS cuota, 
						cuota.importe AS importe, 
						cuota.fvencimiento AS periodo, 
						cuota.fpago AS pago
				FROM suscripcion 
				JOIN cuota ON
					(cuota.suscripcion_id = suscripcion.id)
				WHERE suscriptor_id = $id
				AND suscripcion.fecha_baja Is Null
				ORDER BY suscripcion.id, cuota.nro_cuota;
		";

		$datos = DB::connection('universal')->select($sql);

		return $datos;
	}

}