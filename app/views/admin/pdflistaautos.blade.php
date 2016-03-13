<?php
	$marca =			 '';
	$marca_anterior 	= '';
	$modelo 			= '';
	$modelo_anterior 	= '';
?>
<style>
	table {
		border-collapse: collapse;
		font-size: 3mm;
		text-align: center;
	}
</style>
<table border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td>0km</td>
		<td>2015</td>
		<td>2014</td>
		<td>2013</td>
		<td>2012</td>
		<td>2011</td>
		<td>2010</td>
		<td>2009</td>
		<td>2008</td>
		<td>2007</td>
		<td>2006</td>
		<td>2005</td>
		<td>2004</td>
		<td>2003</td>
		<td>2002</td>
	</tr>
	@foreach ($autos as $a)
		<?php
			$marca1 = $a->marca;
			$modelo = $a->modelo;
		?>

		@if ($marca1<>$marca_anterior)
			<tr>
				<td colspan="5" style="background-color: black;color: white;">MARCA: {{$a->marca}}</td>
			</tr>
			<tr>
				<td colspan="5" style="background-color: #D0D0D0;color: black;">MODELO: {{$a->modelo}}</td>
			</tr>
		@endif

		@if ($marca_anterior == $a->marca && $modelo<>$modelo_anterior)
			<tr>
				<td colspan="5" style="background-color: #D0D0D0;color: black;">MODELO: {{$a->modelo}}</td>
			</tr>
		@endif
			<tr>
				<td colspan="5">{{$a->detalle}}</td>
			</tr>
			<tr>
				<td>{{(intval($a->a0km)==0?'':intval($a->a0km))}}</td>
				<td>{{(intval($a->a2015)==0?'':intval($a->a2015))}}</td>
				<td>{{(intval($a->a2014)==0?'':intval($a->a2014))}}</td>
				<td>{{(intval($a->a2013)==0?'':intval($a->a2013))}}</td>
				<td>{{(intval($a->a2012)==0?'':intval($a->a2012))}}</td>
				<td>{{(intval($a->a2011)==0?'':intval($a->a2011))}}</td>
				<td>{{(intval($a->a2010)==0?'':intval($a->a2010))}}</td>
				<td>{{(intval($a->a2009)==0?'':intval($a->a2009))}}</td>
				<td>{{(intval($a->a2008)==0?'':intval($a->a2008))}}</td>
				<td>{{(intval($a->a2007)==0?'':intval($a->a2007))}}</td>
				<td>{{(intval($a->a2006)==0?'':intval($a->a2006))}}</td>
				<td>{{(intval($a->a2005)==0?'':intval($a->a2005))}}</td>
				<td>{{(intval($a->a2004)==0?'':intval($a->a2004))}}</td>
				<td>{{(intval($a->a2003)==0?'':intval($a->a2003))}}</td>
				<td>{{(intval($a->a2002)==0?'':intval($a->a2002))}}</td>
				
			</tr>
		<?php
			$marca_anterior = $a->marca;
			$modelo_anterior = $a->modelo;
		?>
	
	@endforeach

</table>