<?php
/*
 $table->increments('id')->unique();
            $table->string('nombre','30')->unique();
            $table->string('logo',100);
            $table->enum('mostrar', array('si', 'no'))->default('si');
*/
class Rubro extends Eloquent {

	protected $table = 'rubro';
	protected $primaryKey = 'id';
	public $timestamps = false;

		static public function todos(){
			$sql = "SELECT id, nombre, logo
					  FROM rubro
 					 ORDER BY id";
			$datos = DB::select($sql);
		return $datos;}
}