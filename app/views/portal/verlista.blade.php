<style>
	.listado {
		width: 100%;
		color: black;

	}
	.listado tr:nth-child(even) {background: #CCC}
	.listado tr:nth-child(odd) {background: #FFF}

</style>
@if ( count($autos) > 0 )
<table class="listado letra15">
	<tr>
		<td>Modelo</td>
		<td>Cuota desde</td>
	</tr>
	@foreach($autos as $a)
		<tr>
			<td>{{$a->plan}}</td>
			<td>$ {{Formatos::moneda($a->cuota1)}}</td>
		</tr>
	@endforeach
</table>
@else
<pre>
  Listado no disponible.

  Otros Modos de Consulta:

    * Haga su consulta telefonicamente
    * Llenando el formulario de consulta en la web
    * Via E-Mail
    * Visitándonos en nuestras oficinas
</pre>
@endif