@extends ('cabecera')

@section ('content') 
{{ Cargar::javascript(array( '/js/crearlistado.js' )) }}

<style>
	.info {
		position: fixed;
		width: 400px;
		max-height: 600px;
		scroll-behavior: auto;
		background: white;
		top: 20px;
		right: 10px;
		text-align: center;
		padding: 5px;
	}
	#seleccion {
		width: 100%;
		max-height: 500px;
	}
	#seleccion td {height: 20px; vertical-align: top;}

	#seleccion tr:nth-child(even) {background: #CCC}
	#seleccion tr:nth-child(odd) {background: #FFF}

	.listado {
		border-right: 50%;
		border-left: 50%;		
		width: 600px;
		padding: 10px;
	}
	.listado td {
		vertical-align: top !important;
		padding: 5px;
	}

</style>
<div class="info sombra redondear">
	<table id="seleccion">
		<tr>
			<td>Seleccionados</td>
		</tr>
	</table>
	<button onclick="verlistado()">Ver Listado</button>
</div>

<div class="marco redondear">
<?php
	$i = 0;
	$total = count($marcas);
?>
	<table class="listado" border="1">
		<tr>
			<th colspan="3">Seleccionar Marcas para Listado</th>
		</tr>

		<tr>
			<td>
				<table>
					@for ($i = 0; $i < 20; $i++)
						<tr>
							<td>
								<input  id		="{{$marcas[$i]->id}}" 
										type	="checkbox" 
										value	="{{$marcas[$i]->marca}}" 
										onclick	="javascript:agregar({{$marcas[$i]->id}},'{{$marcas[$i]->marca}}');">
										<a href="javascript:$('#{{$marcas[$i]->id}}').click()">{{$marcas[$i]->marca}}</a>
							</td>
						</tr>
					@endfor
				</table>
			</td>
			<td>
				<table>
					@for ($i = 20; $i < 40; $i++)
						<tr>
							<td>
								<input  id		="{{$marcas[$i]->id}}" 
										type	="checkbox" 
										value	="{{$marcas[$i]->marca}}" 
										onclick	="javascript:agregar({{$marcas[$i]->id}},'{{$marcas[$i]->marca}}');">
										<a href="javascript:$('#{{$marcas[$i]->id}}').click()">{{$marcas[$i]->marca}}</a>
							</td>
						</tr>
					@endfor
				</table>
			</td>
			<td>
				<table class="top">
					@for ($i = 40; $i < $total; $i++)
						<tr>
							<td>
								<input  id		="{{$marcas[$i]->id}}" 
										type	="checkbox" 
										value	="{{$marcas[$i]->marca}}" 
										onclick	="javascript:agregar({{$marcas[$i]->id}},'{{$marcas[$i]->marca}}');">
										<a href="javascript:$('#{{$marcas[$i]->id}}').click()">{{$marcas[$i]->marca}}</a>
							</td>
						</tr>
					@endfor
				</table>
			</td>

		</tr>

	</table>

</div>

 <div id='listado' title='Lista'>
      <div id="contenido">Cargando...</div>
 </div>

@stop
