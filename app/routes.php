<?php
//--- SI URL NO EXISTE IR AL RAIZ
App::missing(function($exception)
  {return Redirect::to('/');
});

//--- PRUEBA
Route::get('test', function() {   
    return 'test';
});


App::error(function(Exception $exception, $code)
{
      if(Request::ajax() && $code<>500) {
        return Response::make('Su sesión expiró....');
      }
      if ($code==404){
        return Redirect::to('/')->withFlashMessage('Inicie sesión.');
      }
      if ($code==405){
        return 'Su sesión expiró.';
      }
      
    if ( ! Config::get('app.debug')) {
        // Retorna una vista o lo que creas conveniente
      //Log::useFiles(storage_path().'/logs/errores_produccion.log');
      $ip = Request::getClientIp();
      try {
      $nro_persona = Auth::user()->nro_persona;
      } catch (Exception $e) {
      $nro_persona = 'no disponible';
      }
    Log::error("[código:$code][ip:$ip][persona:$nro_persona]\n".$exception->getMessage());

        return 'Servicio no disponible. Intente más tarde.';
    }
});

//--- Ruta por defecto
Route::resource('/', 'inicioControlador');

Route::group(array('before' => 'auth'), function(){
    Route::resource('inicio',       'generalControlador@inicio');
    Route::resource('caja',         'cajaControlador@inicio');
    Route::resource('persona',      'personaControlador@inicio');
    Route::resource('cuentaahorro', 'cajaControlador@inicio');
    Route::resource('suscripcion',  'suscripcionControlador@inicio');
    Route::resource('liquidacion',  'liquidacionControlador@inicio');
    Route::resource('proveedor',    'proveedorControlador@inicio');
    Route::resource('consultas',    'consultasControlador@inicio');
    Route::resource('contabilidad', 'consultasControlador@inicio');
    Route::resource('admin',        'adminControlador@inicio');
}); //--------- FIN ADMIN ACCESS

/*
//--------------- RUTAS QUE ACCEDE ADMIN
Route::group(array('before' => 'auth|soyadmin'), function(){
    Route::resource('admin', 'adminControlador@inicio');
}); //--------- FIN ADMIN ACCESS

//--------------- RUTAS QUE ACCEDE SOCIO O SOCIO/COMERCIO
Route::group(array('before' => 'auth|soyusuario'), function(){
    //Route::controller('usuario','usuarioControlador');
    Route::controller('socio','socioControlador');
}); //--------- FIN ADMIN ACCESS

//--------------- RUTAS QUE ACCEDE COMERCIO
Route::group(array('before' => 'auth|soycliente'), function(){
    Route::controller('autorizaciones','comercioControlador');
    Route::post('validar','comercioControlador@validar');
}); //--------- FIN ADMIN ACCESS

//----- RUTAS QUE ACCEDE EL USUARIO POR PRIMERA VEZ PARA CAMBIAR CLAVE O RESETEAR CLAVE
Route::group(array('before' => 'auth'), function(){
    Route::post('cambiarclave','loginControlador@cambiarpass');
    Route::get('cambiarclave', function()
    {
      return View::make('login.cambiarclave')->withFlashMessage('');
    });
}); //--------- FIN ADMIN ACCESS
*/

//listado de prueba
//Route::controller('listado', 'prueba');

//--- Login
Route::post('entrar', 'loginControlador@acceso');
Route::get('salir', 'loginControlador@salir');

//--- cargar usuario de prueba
Route::get('verlog/{archivo}', function($archivo)
{ /*
  $clave = '123123';
  $email = 'super@apla.com';
  $nro_persona = 1064;
  $estado = 0; //0=cambiar pass, 1=acceso
  $nivel = 2; //1=usuario, 2=comercio, 3=usuario y comercio, 99=admin

  $insert = DB::insert("insert into hb_usuario
  						 ( nro_persona,    clave,    email,   estado,  nivel) values 
  						 ($nro_persona,	'$clave', '$email',	 $estado, $nivel)
  					  ");

	return 'Insertado: '.$insert; */

return View::make('general.verlog')->with('archivo',$archivo);
});