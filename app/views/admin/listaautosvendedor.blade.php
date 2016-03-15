<style>
	.lista {
		width: 100%;
		height: auto;
		background: white;
		font-size: 3mm;
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
	.lista td {
		padding-left: 3mm;
		padding-right: 3mm;
		padding-bottom: 1mm;
		padding-top: 1mm;
	}
	caption {
		font-size: 5mm;
	}

	.membrete {
		width: 177mm;
		height: 28mm;
	}
	table thead {
		border: 0;
	}
@media print {
		.membrete {
		display: table-header-group;
	}

</style>

<?php
	$marca 				= '';
	$marca_anterior 	= '';
	$modelo 			= '';
	$modelo_anterior 	= '';
?>

{{--		@if ($membrete==1)
				<div class="membrete"><img src="/img/membrete.gif" alt=""></div>
			@else
				<div class="membrete"></div>
			@endif
--}}

<table border="1" class="lista letra11">
	<thead>
		<tr>
			<th colspan="6">
				@if ($membrete==1)
					<h1>PREMIER NOA S.R.L.</h1>
					<h3>Tel/Fax (0341) 679-1831 - Lima 1422 - 2000 Rosario - Santa Fe</h3>
					<style>
						@page {
	  						margin: 1cm 1cm 1cm 1cm;
						}
					</style>
				@else
					<style>
						@page {
	  						margin: 4cm 1cm 1cm 1cm;
						}
					</style>
				@endif
				<h2>Listado de autos 0 Km. ({{date('d-m-Y')}})</h2>
			</th>
		</tr>
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
