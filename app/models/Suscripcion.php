<?php

class suscripcion extends Eloquent {

	protected $connection   = 'universal';
	protected $table 		= 'suscripcion';
	protected $primaryKey 	= 'id';
	public 	  $timestamps	= false;

	static public function suscripciones($id)
	{
		$sql = "
				SELECT 	suscripcion.fecha_alta AS fecha,	
						suscripcion.nro AS nro, 
						suscripcion.plan AS plan, 
						cant_cuotas AS cantCuotas,
						valor_cuota AS valorCuota,

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

	static public function listado(){
		$sql = "
			Select 
				concat(suscriptor.apellido, ', ', suscriptor.nombre) as nombre, suscriptor.dni, suscriptor.nacimiento, suscriptor.domicilio,
		        localidad.nombre as localidad, provincia.nombre as provincia,
				suscripcion.id as suscripcion_id, suscripcion.fecha_alta, IF(suscripcion.fecha_baja is null,'ACTIVO','BAJA') as estado,
		        suscripcion.nro, suscripcion.plan, suscripcion.valor_cuota,
		        (Select sum(cuota.importe) From cuota Where cuota.suscripcion_id = suscripcion.id) as nominal,
		        (Select sum(cuota.importe) From cuota Where cuota.suscripcion_id = suscripcion.id And cuota.fpago is not null) as pagado,
		        
		        Concat(
		        Convert(
		        (
		        (100 / ( Select Sum(cuota.importe) From cuota Where cuota.suscripcion_id = suscripcion.id) ) *
				( Select Sum(cuota.importe) From cuota Where cuota.suscripcion_id = suscripcion.id And cuota.fpago is not null) 
		        )
				 , signed), '%')
		        as x100
        
			From suscripcion
			Join suscriptor On
					(suscriptor.id = suscripcion.suscriptor_id)
			Join localidad On
					(localidad.id = suscriptor.localidad_id)
			Join provincia On
					(provincia.id = localidad.provincia_id)
			Order By suscriptor.apellido
		";

		$datos = DB::connection('universal')->select($sql);

		return $datos;

	}

}