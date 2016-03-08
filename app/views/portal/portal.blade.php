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
					<td>Contraseña:</td>	<td><input type="text" id="pass"></td>
				</tr>
	      	</table>
	      </form>
      </div>
 </div>

<script type="text/javascript" src="/slick/slick.min.js"></script>

@stop