@extends ('cabecera')

@section ('content')

<style>
	.fondo * {
		vertical-align: top;
	}
	.datos {
		text-align: center;
		font-size: 12px;
		background: white;
		padding: 3px;
		min-width: 150px;
	}
	.datos td {
		color: blue;
	}
	.datos caption {
		background: blue;
		color: white;
	}
	.suscripciones {
		/* scroll-behavior: hidden;
		max-height: 600px; */
		text-align: center;
		height: 600px;
		overflow: auto;
		padding-left: 50px;
		font-size: 12px;
	}
	.infoSus {
		width: 100%;
	}
	.infoSus td {
		background: white;
	}
	.cuotas {
		font-size: 15px;
	}
	.cuotas tr:nth-child(odd) {
		background: white
	}
</style>

<div class="marco redondear sombra">
	<img src="/img/cabeza.png" alt="">

<table class="fondo">
	<tr>
		<td>
			<table class="datos redondear">
				@foreach ($cliente as $info)
			
					<tr>
						<caption><strong>Datos Suscriptor</strong></caption>
					</tr>
					<tr><th>Fecha de Alta</th></tr>	
					<tr><td>{{Formatos::fecha($info->fecha_alta)}}</td></tr>
					<tr><th>Apellido</th></tr>
					<tr><td>{{Formatos::capital($info->apellido)}}</td></tr>
					<tr><th>Nombre</th></tr>
					<tr><td>{{Formatos::capital($info->nombre)}}</td></tr>
					<tr><th>Documento</th></tr>
					<tr><td>{{Formatos::dni($info->dni)}}</td></tr>
					<tr><th>Domicilio</th></tr>
					<tr><td>{{Formatos::capital($info->domicilio)}}</td></tr>
					<tr><th>Localidad</th></tr>
					<tr><td>{{Formatos::capital($info->localidad)}}</td></tr>
					<tr><th>Provincia</th></tr>
					<tr><td>{{Formatos::capital($info->provincia)}}</td></tr>
					<tr><th>Telefono</th></tr>
					<tr><td>{{$info->telefono}}</td></tr>
					<tr><td><br>
							<a href="salir" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
								<span class="ui-button-text">Desconectar</span>
							</a>
							<br>
					</td></tr>
				@endforeach
			</table>
		</td>		
		<td>
			<div class="suscripciones">
				<table class="infoSus" border="1">
					<tr>
						<caption><strong>Suscripción</strong></caption>
					</tr>
					<tr>
						<th>Nro Suscripción:</th><td>{{$suscripciones[0]->nro}}</td>
						<th>Fecha Alta:</th><td>{{Formatos::fecha($suscripciones[0]->fecha)}}</td>
					</tr>
					<tr>
						<th>PLAN:</th><td colspan="3">{{$suscripciones[0]->plan}}</td>
					</tr>
					<tr>
						<th>Cuotas</th><td>{{$suscripciones[0]->cantCuotas}}</td>
						<th>Importe</th><td>{{Formatos::moneda($suscripciones[0]->valorCuota)}}</td>
					</tr>
				</table>
				<table class="cuotas" border="1">
					<tr>
						<caption><strong>Detalle de Cuotas</strong></caption>
					</tr>
					@if (count($suscripciones)==0)
						<tr>
							<td>No tiene planes activos.</td>
						</tr>
					@else
						<tr>
							<th width="40px">Cuota</th>
							<th width="100px">Importe</th>
							<th width="150px">Período</th>
							<th width="80px">Estado</th>
						</tr>
						@foreach($suscripciones as $sus)
							<tr>
								<td align="center">{{$sus->cuota}}</td>
								<td align="right">{{Formatos::moneda($sus->importe)}}</td>
								<td>{{Formatos::periodo($sus->periodo)}}</td>
								<td>@if ($sus->pago)
										<span>Pagado</span>
									@else
										<span>Pendiente</span>
									@endif</td>
							</tr>
						@endforeach
					@endif
				</table>
			</div>
		</td>
	</tr>
</table>

<img src="/img/pie.png" alt="">

</div>

@stop