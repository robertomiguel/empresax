@extends ('cabecera')

@section ('content') 
  <script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>
  <style>
  .ui-menu { width: 250px; }
  </style>
<?php 
/*
$sql = "insert into menu_general (nombre, id_padre, id_grupos,visible)
values ('listado esp 1', 15, '0', 1)";
$datos = DB::insert($sql);
*/

$sql = "select * from menu_general order by id_padre, id";
$datos = DB::select($sql);
?>
<pre>
@foreach ($datos as $m)
ID:{{$m->id}} NOMBRE:{{$m->nombre}} ID_PADRE:{{$m->id_padre}}
@endforeach	
</pre>
<ul id="menu">
@foreach ($datos as $m)

	@if ($m->id_padre == 0)
	<li>Modulo: {{$m->nombre}}
	<ul>
	@foreach ($datos as $sm)
	@if ($sm->id_padre == $m->id && $m->id <> 0)
		<li>SUB (1) id={{$sm->id}} / id_padre={{$sm->id_padre}}: {{$sm->nombre}}
	<ul>
	@foreach ($datos as $sm2)
	@if ($sm2->id_padre == $sm->id && $sm->id <> 0)
			<li>SUB (2) id={{$sm2->id}} / id_padre={{$sm2->id_padre}}: {{$sm2->nombre}}
	<ul>
	@foreach ($datos as $sm3)
	@if ($sm3->id_padre == $sm2->id && $sm2->id <> 0)
				<li>SUB (3) id={{$sm3->id}} / id_padre={{$sm3->id_padre}}: {{$sm3->nombre}}
	<ul>
	@foreach ($datos as $sm4)
	@if ($sm4->id_padre == $sm3->id && $sm3->id <> 0)
					<li>SUB (4) id={{$sm4->id}} / id_padre={{$sm4->id_padre}}: {{$sm4->nombre}}</li>
	@endif
	@endforeach
	</ul>
	@endif
	@endforeach
	</li></ul>
	@endif
	@endforeach
	</li></ul>
	@endif
	@endforeach
	</li></ul>
	@endif

@endforeach
</ul>

@stop