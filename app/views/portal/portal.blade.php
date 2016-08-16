@extends ('cabecera')

@section ('content')

{{ Cargar::javascript(array( '/js/portal.js' )) }}

<style>
	.p84 {
		font-size: 30px;
	}

	.marcas2 {
		width: 100%;
		text-align: center;
	}
</style>

<div class="marco redondear sombra">

<table>
	<tr>
		<td colspan="3"><img src="/img/cabeza.png" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<hr>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<img src="/img/marcas2.png" alt="">
		<!--
			<table align="center" class="marcas2">
				<tr>
					<td>
						<img src="/img/ford.png" alt="">
					</td>
					<td>
						<img src="/img/chevrolet.png" alt="">
					</td>
					<td>
						<img src="/img/fiat.png" alt="">
					</td>
					<td>
						<img src="/img/volkswagen.png" alt="">
					</td>
					<td>
						<img src="/img/toyota.png" alt="">
					</td>
					<td>
						<img src="/img/renault.png" alt="">
					</td>
				</tr>
			</table>
		-->
		</td>
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
					<td>
						<a href="javascript:plan84()">
							<!-- <img class="botonplan84" src="/img/plan84.png" alt=""> -->
							<b>PLAN <br> <span class="p84">84</span> <br> CUOTAS</b>
						</a>
					</td>
				</tr>
				<tr>
					<td><a href="/agricola">Agrícola</a></td>
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
		<td colspan="3" align="center"><img src="/img/toyota_promo.png" alt=""></td>
	</tr>
	<tr>
		<td colspan="3"><img src="/img/pie.png" alt=""></td>
	</tr>
</table>	

</div>

 <div id='ventana' title='Lista'>
      <div id="contenido">Cargando...</div>
 </div>

<div id='consultar' title='Consulta'>
      <div class="consulta">
	      	<table>
				<tr>
		      		<td>Nombre:</td>	<td><input type="text" id="nombre"></td>
				</tr>
				<tr>
					<td>Teléfono:</td>	<td><input type="text" id="tel"></td>
				</tr>
				<tr>
					<td>Localidad:</td>	<td><input type="text" id="localidad"></td>
				</tr>
		        <tr>
		       		<td>E-Mail:</td>	<td><input type="email" id="email"></td>
		        </tr>
		        <tr>
		       		<td>Consulta:</td>	<td><textarea id="consulta" cols="30" rows="5" maxlength="300" ></textarea></td>
		        </tr>
	      	</table>
	      </form>
      </div>
 </div>

<div id='ingresar' title='Acceso Clientes'>
      <div class="clientes">
	      	<table>
				<tr>
		      		<td>Usuario:</td>	<td><input type="text" id="usuario"></td>
				</tr>
				<tr>
					<td>Contraseña:</td>	<td><input type="password" id="pass"></td>
				</tr>
	      	</table>
	      </form>
      </div>
 </div>

<div id='plan84' title='Plan 84 cuotas'>
      <div class="plan84">
	      	<table>
				<tr>
		      		<td>Cuotas Fijas en Pesos</td>
				</tr>
				<tr>
					<td>Entrega con el 50% de la unidad</td>
				</tr>
				<tr>
					<td>A partir de la cuota seis puede solicitar la entrega</td>
				</tr>
				<tr>
					<td>Cuota espera: paga el 50% hasta la entrega</td>
				</tr>
				<tr>
					<td>Sorteo: posibilidad de ganar el 30% del vehículo</td>
				</tr>
				<tr>
					<td>La unidad se entrega con garantía prendaria,<br>
						hasta cumplir con el pago total (única garantía)</td>
				</tr>
				<tr>
					<td>Unidades 0KM con garantía de fábrica</td>
				</tr>
				<tr>
					<td>LA MEJOR FINANCIACION DEL MERCADO</td>
				</tr>
	      	</table>
	      </form>
      </div>
 </div>


<script type="text/javascript" src="/slick/slick.min.js"></script>

@stop