@if (count($resultados) > 0)
	<style>
		.resultado {
			width: 100%;
			font-size: 15px;
		}
		.marcalogolista {
			width: 30px;
		}
		.resultado tr:nth-child(even) {background: #CCC}
		.resultado tr:nth-child(odd) {background: #FFF}
	</style>
	<table class="resultado">
	<tr>
		<th colspan="2">Modelo</th>
		<th>Desde</th>
	</tr>
		@foreach($resultados as $r)
			<tr>
				<td><img class="marcalogolista" src="{{$r->logo}}" alt=""></td>
				<td>{{$r->plan}}</td>
				<td align="right">{{Formatos::moneda($r->cuota1)}}</td>
			</tr>
		@endforeach
	</table>
@else
	<p>
		No se encotraron resultados.
	</p>
	<p>
		Intente buscar sin la Marca, solo ingrese modelo o característica:
	</p>
	<pre>
		Ejemplo:
			ranger
			trend
			4x4
			4x2
			focus
			TDI
			amarok
	</pre>
@endif