@extends ('cabecera')

@section ('content') 
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
	<table>
		<tr>
			<th>Seleccionar Marcas para Listado</th>
		</tr>
		@foreach($marcas as $m)
			<tr>
				<td>
					<input id="{{$m->id}}" type="checkbox" value="{{$m->marca}}" onclick="javascript:agregar({{$m->id}},'{{$m->marca}}');"> {{$m->marca}}
				</td>
			</tr>
		@endforeach
	</table>

</div>

 <div id='listaautos' title='Lista'>
      <div id="contenido">Cargando...</div>
 </div>

@stop