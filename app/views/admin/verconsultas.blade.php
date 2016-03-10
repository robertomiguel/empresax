<html>
	<head>
		<title>Ver Consultas</title>
	</head>	
	<body>
		@if ($consultas<>'')
			Lista de consultas: <br>
			@foreach ($consultas as $c)
				{{$c->nombre}}<br>
				{{$c->telefono}}<br>
				{{$c->localidad}}<br>
				{{$c->email}}<br>
				{{$c->consulta}}
				<hr>
			@endforeach
		@else
			<h2>ERROR 505</h2>
		@endif
	</body>
</html>

{{--nombre, telefono, localidad, email, consulta, ip--}}