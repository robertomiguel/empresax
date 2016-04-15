<?php
class Agricola extends Eloquent {

	protected $table 		= 'agricola';
	protected $primaryKey 	= 'id';
	public $timestamps 		= false;

	static public function listado()
	{
		$sql = "
				SELECT  agricola.id, agricola.marca_id, agricola.modelo_id,
						agricola.detalle, agricola.foto, agricola.info,
	        			agr_marca.nombre as marca,
	        			agr_modelo.nombre as modelo
				FROM agricola
				JOIN agr_marca ON
					(agr_marca.id = agricola.marca_id)
				JOIN agr_modelo ON
					(agr_modelo.id = agricola.modelo_id)
			";

		$datos = DB::select($sql);

		return $datos;
	}
}