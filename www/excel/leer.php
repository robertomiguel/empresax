<?php 
echo '<h1>leer autos.xlsx</h1>';

if (!defined('PHPEXCEL_ROOT')) {
    define('PHPEXCEL_ROOT', dirname(__FILE__) . './Classes/');
    require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}



					//cargamos el archivo que deseamos leer
					$objPHPExcel = PHPExcel_IOFactory::load('./autos_marzo_2016.xls');
					//obtenemos los datos de la hoja activa (la primera)
					$objHoja=$objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
					
					//recorremos las filas obtenidas
/*
						echo '<table border="1">
							<tr>
								<th>Modelo</th>
								<th>0 KM</th>
								<th>2015</th>
								<th>2014</th>
								<th>2013</th>
								<th>2012</th>
								<th>2011</th>
								<th>2010</th>
								<th>2009</th>
								<th>2008</th>
								<th>2007</th>
								<th>2006</th>
								<th>2005</th>
								<th>2004</th>
								<th>2003</th>
								<th>2002</th>
							</tr>';
*/
					$marca_id = 0;
					foreach ($objHoja as $iIndice=>$objCelda) {
						//imprimimos el contenido de la celda utilizando la letra de cada columna
						//12566463 marca
						//13408767 modelo
						//16777215 detalle
						if ($objCelda['AF']=='12566463') {
							//$modelo_id = 0;
							//$marca_id++;
							$marca = $objCelda['A'];
							//echo '<h3>'.$marca_id.') '.$objCelda['A'].'</h3>';
						}
						if ($objCelda['AF']=='13408767') {
							//$detalle_id = 0;
							//$modelo_id++;
							$modelo = $objCelda['A'];
							//echo '<h4>'.$marca_id.'.'.$modelo_id.') '.$objCelda['A'].'</h4>';
						}
						if ($objCelda['AF']=='16777215') {
							//$detalle_id++;
							$detalle = $objCelda['A'];
							//echo '<h5>'.$marca_id.'.'.$modelo_id.'.'.$detalle_id.') '.$objCelda['A'].'</h5>';
							echo "insert into autos (
								marca,
								modelo,
								detalle,

								a0km,
								a2015,
								a2014,
								a2013,
								a2012,
								a2011,
								a2010,
								a2009,
								a2008,
								a2007,
								a2006,
								a2005,
								a2004,
								a2003,
								a2002
							) Values (
								'$marca',
								'$modelo',
								'$detalle',

								".(str_replace('.','',$objCelda['F'])*1).",
								".($objCelda['H']*1).",
								".($objCelda['I']*1).",
								".($objCelda['K']*1).",
								".($objCelda['L']*1).",
								".($objCelda['M']*1).",
								".($objCelda['O']*1).",
								".($objCelda['R']*1).",
								".($objCelda['S']*1).",
								".($objCelda['V']*1).",
								".($objCelda['W']*1).",
								".($objCelda['Z']*1).",
								".($objCelda['AA']*1).",
								".($objCelda['AB']*1).",
								".($objCelda['AC']*1)."

							);<br>
							";
						}
						/*
						echo '
							<tr>
								<td>'.$objCelda['A'].'</td>
								<td>'.$objCelda['F'].'</td>
								<td>'.$objCelda['H'].'</td>
								<td>'.$objCelda['I'].'</td>
								<td>'.$objCelda['K'].'</td>
								<td>'.$objCelda['L'].'</td>
								<td>'.$objCelda['M'].'</td>
								<td>'.$objCelda['O'].'</td>
								<td>'.$objCelda['R'].'</td>
								<td>'.$objCelda['S'].'</td>
								<td>'.$objCelda['V'].'</td>
								<td>'.$objCelda['W'].'</td>
								<td>'.$objCelda['Z'].'</td>
								<td>'.$objCelda['AA'].'</td>
								<td>'.$objCelda['AB'].'</td>
								<td>'.$objCelda['AC'].'</td>
							</tr>
						';*/
					}
					//echo '</table>';

 ?>