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
	}
	.cuotas {
		font-size: 15px;
		min-width: 500px
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
				@endforeach
			</table>
		</td>		
		<td>
			<div class="suscripciones">
				<table class="cuotas">
					<tr>
						<caption><strong>Mis Suscripciones</strong></caption>
					</tr>
					@if (count($suscripciones)==0)
						<tr>
							<td>No tiene planes activos.</td>
						</tr>
					@else
						<tr>
							<th>Nro Cuota</th>
							<th>Importe</th>
							<th>Período</th>
							<th>Estado</th>
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