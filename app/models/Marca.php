<?php
/*
$table->increments('id')->unique();
            $table->string('nombre','30')->unique();
            $table->string('logo',100);
            $table->enum('mostrar', array('si', 'no'))->default('si');
            $table->timestamps();
*/
class Marca extends Eloquent {

	protected $table = 'marca';
	protected $primaryKey = 'id';
	public $timestamps = false;

		static public function todas(){
			$sql = "SELECT id, nombre, logo
					  FROM marca
 					 ORDER BY id";
			$datos = DB::select($sql);
		return $datos;}
}