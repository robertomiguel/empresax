<html>
<head>
	
</head>	
<body>
	
<pre>
id nombre id_padre

1, caja, 0
2, operaciones de caja, 1
3, abrir caja, 2
4, listados, 1
5, resumen de caja, 4
6, configuracion, 1
7, configurar caja, 6
8, socios, 0
9, ABM socios, 8
10, listados, 8
11, padron de socios, 10
</pre>
{{ count($menu) }}
@foreach ($menu as $m)

	{{$m->nombre}}, {{$m->id_padre}} <br>

@endforeach

</body>
</html>