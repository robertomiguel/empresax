<style>
	ul img {
		width: 300px;
	}
</style>
lista de autos <br>
<?php 
$directorio = '/home/roberto/empresax/www/autos';
$marcas  = scandir($directorio);

echo '<ul>';

foreach ($marcas as $nombre) {
	if (is_dir($directorio.'/'.$nombre ) and ($nombre <> '.') and ($nombre <> '..') ){
		echo '<li><b>'.$nombre.'</b></li>';
		$modelos = scandir($directorio.'/'.$nombre);
		echo '<ul>';
		foreach ($modelos as $nombreMod) {
			$modelo = $directorio.'/'.$nombre.'/'.$nombreMod;
			if (!is_dir($modelo) and esImagen($modelo)) {
				echo '<li>'.nombre($nombreMod).' // <img src="/autos/'.$nombre.'/'.$nombreMod.'"></li>';
			}
		}
		echo '</ul>';
	}
}

echo '</ul>';

function esImagen($file) {

	$imagenInfo = getimagesize($file);
	if ($imagenInfo[0]>=1){
		$imagen = true;
	} else {
		$imagen = false;
	}
	return $imagen;
}

function nombre($nombre) {
	return ucwords( str_replace('_', ' ', substr($nombre, 0, strlen($nombre) - 4)));
}
?>