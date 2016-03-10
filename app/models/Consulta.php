<?php
/*
Drop table if exists consulta;
CREATE TABLE `consulta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `localidad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `consulta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `consulta_id_unique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

Insert into consulta 
(nombre, telefono, localidad, email, consulta, ip) Values
('pepe','123','rosario','m@mail.com','alguna webada','1.1.1.1');

*/

class Consulta extends Eloquent {

	protected $table = 'consulta';
	protected $primaryKey = 'id';
	public $timestamps = false;

	static public function grabar($nombre, $tel, $localidad, $email, $consulta, $ip) {
		$sql = "Insert into consulta 
				(nombre, telefono, localidad, email, consulta, ip) Values
				('$nombre','$tel','$localidad','$email','$consulta','$ip')";

		$datos = DB::insert($sql);
	return $datos;
	}

	static public function mostrar() {
		$sql = "Select * From consulta";

		$datos = DB::select($sql);
	return $datos;
	}

}