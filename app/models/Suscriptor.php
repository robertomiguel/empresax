<?php

class Suscriptor extends Eloquent {

	protected $connection   = 'universal';
	protected $table 		= 'suscriptor';
	protected $primaryKey 	= 'id';
	public 	  $timestamps	= false;

	static public function datosCliente($id)
	{
		$sql = "
				SELECT
						suscriptor.id AS id,
						suscriptor.dni AS dni,
                        localidad.nombre AS localidad,
                        provincia.nombre AS provincia,
				    	domicilio AS domicilio,
				    	(tel + ' / ' + celular) AS telefono,
				    	created_at AS fecha_alta,
				    	suscriptor.nombre as nombre,
                        suscriptor.apellido as apellido
		    	FROM suscriptor
				JOIN localidad ON
					(localidad.id = localidad_id)
				JOIN provincia ON
					(provincia.id = localidad.provincia_id)
		    	WHERE suscriptor.id = $id
		";

		$datos = DB::connection('universal')->select($sql);

		return $datos;
	}

}