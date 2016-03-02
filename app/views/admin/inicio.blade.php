@extends ('cabecera')

@section ('content') 

<script src="js/jstree.min.js"></script>

<script>
/*
  $(function() {
    $( "#menu" ).menu();
  });
  */

  $(function () { $('#jstree_demo_div').jstree(); });

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

$sql   = "select * from menu_general order by id_padre, id";
$datos = DB::select($sql);
$menu1 = 0;
$menu2 = 0;
$menu3 = 0;
$menu4 = 0;
?>
<pre>
@foreach ($datos as $m)
ID:{{$m->id}} NOMBRE:{{$m->nombre}} ID_PADRE:{{$m->id_padre}}
@endforeach	
</pre>

<div id="jstree_demo_div">
<ul>
@foreach ($datos as $m)

	@if ($m->id_padre == 0)
		<li>Modulo: {{$m->nombre}}
		@foreach ($datos as $sm)
			@if ($sm->id_padre == $m->id && $m->id <> 0)
				@if ($menu1==0)
					<ul>
					<?php $menu1=1; ?>
				@endif
				<li>SUB (1) id={{$sm->id}} / id_padre={{$sm->id_padre}}: {{$sm->nombre}}

				@foreach ($datos as $sm2)
					@if ($sm2->id_padre == $sm->id && $sm->id <> 0)
						@if ($menu2==0)
							<ul>
							<?php $menu2=1; ?>
						@endif
						<li>SUB (1) id={{$sm2->id}} / id_padre={{$sm2->id_padre}}: {{$sm2->nombre}}

						@foreach ($datos as $sm3)
							@if ($sm3->id_padre == $sm2->id && $sm2->id <> 0)
								@if ($menu3==0)
									<ul>
									<?php $menu3=1; ?>
								@endif
								<li>SUB (1) id={{$sm3->id}} / id_padre={{$sm3->id_padre}}: {{$sm3->nombre}}

								@foreach ($datos as $sm4)
									@if ($sm4->id_padre == $sm3->id && $sm3->id <> 0)
										@if ($menu4==0)
											<ul>
											<?php $menu4=1; ?>
										@endif
										<li>SUB (1) id={{$sm4->id}} / id_padre={{$sm4->id_padre}}: {{$sm4->nombre}}
									@endif
								@endforeach
									@if ($menu4==1)
										</ul>
										<?php $menu4=0; ?>
									@endif
								</li>

							@endif
						@endforeach
							@if ($menu3==1)
								</ul>
								<?php $menu3=0; ?>
							@endif
						</li>

					@endif
				@endforeach
					@if ($menu2==1)
						</ul>
						<?php $menu2=0; ?>
					@endif
				</li>

			@endif
		@endforeach
			@if ($menu1==1)
				</ul>
				<?php $menu1=0; ?>
			@endif
		</li>
	@endif

@endforeach
</lu>
</div>
@stop