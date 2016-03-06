@extends ('cabecera')

@section ('content')

<div class="marco redondear sombra">

<table>
	<tr>
		<td colspan="3"><img src="/img/cabeza.png" alt=""></td>
	</tr>	
	<tr>
		<td class="menu" width="200px">
			<table class="marcas">
				<tr>
					<td><a href="javascript:laempresa()">La Empresa</a></td>
				</tr>
				<tr>
					<td><img src="/img/marcas.png" alt=""></td>
				</tr>
				@foreach ($marcas as $m)
					<tr>
						<td><a href="javascript:cargarlista({{$m->id}})"  >{{$m->nombre}}</a></td>
					</tr>
				@endforeach
					<tr><td><img src="/img/consultar.png" alt=""></td></tr>
				<tr>
					<td><a href="javascript:consultar()">Consultar</a></td>
				</tr>
			</table>
		</td>
		<td class="detalle" width="510px">
			<table>
				<tr>
					<td>
					<div  class="imagenes sombra redondear">
						@foreach ($autos as $a)
							<div>
								<h3>{{$a->plan}}</h3>
								<img class="auto" src="{{$a->foto1}}" alt="">
								<h3>Desde $ {{Formatos::moneda($a->cuota1)}}.-</h3>
								<img class="marca" src="{{$a->logo}}" alt="">
							</div>
						@endforeach
					</div>
						<br>
					</td>
				</tr>
			</table>
		</td>
		<td>
			<table class="rubros">
				<tr>
					<td><img src="/img/plan84.png" alt=""></td>
				</tr>
				@foreach ($rubros as $r)
					<tr>
						<td><a href="javascript:rubrolistado({{$r->id}})">{{$r->nombre}}</a></td>
					</tr>
				@endforeach
				<tr>
					<td><input id="buscar" type="text" class="buscar redondear"></td>
				</tr>
				<tr>
					<td><a href="javascript:buscar()">Buscar</a></td>
				</tr>
				<tr>
					<td><img src="/img/acceso.png" alt=""></td>
				</tr>
				<tr>
					<td><a href="javascript:ingresar()">Ingresar</a></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="3"><img src="/img/pie.png" alt=""></td>
	</tr>
</table>	

</div>

 <div id='ventana' title='Lista'>
      <div id="contenido">Cargando...</div>
 </div>

<script type="text/javascript" src="/slick/slick.min.js"></script>
@stop
