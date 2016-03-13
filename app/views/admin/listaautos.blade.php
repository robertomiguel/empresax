<style>
	.lista {
		width: 100%;
		height: auto;
		background: white;
		font-size: 11px;
		border-collapse: collapse;
	}
	.fmarca {
		background: black !important;
		color: white;
	}
	.fmodelo {
		background: #DADADA !important;
		color: black;
	}
	.lista tr:hover{
		background: #C6EAF2
	}
@media print {
	thead {
		display: table-header-group;
	}
}
@page {
  		margin: 4cm 1cm 1cm 1cm;
	}
</style>
<?php
	$marca =			 '';
	$marca_anterior 	= '';
	$modelo 			= '';
	$modelo_anterior 	= '';
?>
<table border="1" class="lista letra11">
<thead>
	<tr>
		<th></th>
		<th>0km</th>
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
	</tr>
</thead>
<tbody>
	@foreach ($autos as $a)
		<?php
			$marca1 = $a->marca;
			$modelo = $a->modelo;
		?>
		@if ($marca1<>$marca_anterior)
			<tr>
				<th class="fmarca">MARCA: {{$a->marca}}</th>
			</tr>
			<tr>
				<th class="fmodelo">MODELO: {{$a->modelo}}</th>
				<th>0km</th>
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
			</tr>
		@endif
		@if ($marca_anterior == $a->marca && $modelo<>$modelo_anterior)
			<tr>
				<th class="fmodelo">MODELO: {{$a->modelo}}</th>
				<th>0km</th>
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
			</tr>
		@endif
		<tr>
			<td>{{$a->detalle}}</td>
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
</tbody>
</table>