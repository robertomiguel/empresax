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
	$marca 				= '';
	$marca_anterior 	= '';
	$modelo 			= '';
	$modelo_anterior 	= '';
?>
<table border="1" class="lista letra11">
<thead>
	<tr>
		<th></th>
		<th>Fábrica</th>
		<th>V. Nominal</th>
		<th>Cuota</th>
		<th>Adjudica</th>
		<th>Gastos Admin.</th>
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
			</tr>
		@endif
		@if ($marca_anterior == $a->marca && $modelo<>$modelo_anterior)
			<tr>
				<th class="fmodelo">MODELO: {{$a->modelo}}</th>
			</tr>
		@endif
			<tr>
				<td align="left">{{$a->detalle}}</td>
				<td align="right">{{Formatos::moneda($a->a0km)}}</td>
				<td align="right">{{Formatos::moneda($a->nominal)}}</td>
				<td align="right">{{Formatos::moneda($a->cuota)}}</td>
				<td align="right">{{Formatos::moneda($a->nominal / 2)}}</td>
				<td align="right">{{Formatos::moneda($a->nominal * 0.03)}}</td>
			</tr>
		<?php
			$marca_anterior = $a->marca;
			$modelo_anterior = $a->modelo;
		?>
	@endforeach
</tbody>
</table>
