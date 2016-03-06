<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Empresa X')</title>
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
    <!--meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1"-->
    <link rel="shortcut icon" href="favicon.png" />
<?php //seleccionar tema
$ini = parse_ini_file("../app/config/temajs.ini");
$sel = $ini['seleccion'];
$tema = $ini[$sel];
 ?>
<?php /*
    {{ HTML::style('/assets/css/bootstrap.min.css', array('media' => 'screen')) }}
*/ ?>        
    {{ HTML::style("/css/temas/$tema/jquery-ui.min.css", array('media' => 'screen')) }}
    {{ HTML::style("/css/temas/$tema/theme.css", array('media' => 'screen')) }}
     <link rel="stylesheet" href="tema/css/estilos.css">

      <link rel="stylesheet" type="text/css" href="/slick/slick.css"/> 
      <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>

    {{ Cargar::stylesheet(array(
                          '/css/jquery.dataTables.min.css',
                          '/css/dataTables.jqueryui.css',
                          '/css/global.css',
                          )) }}    

    {{ Cargar::javascript(array(
                                '/js/jquery-1.11.2.min.js',
                                '/js/jquery-ui.min.js',
                                '/js/jquery.dataTables.min.js',
                                '/js/global.js'
                                )) }}

  </head>
  <body>
  
        @yield('content')
  
  </body>
</html>