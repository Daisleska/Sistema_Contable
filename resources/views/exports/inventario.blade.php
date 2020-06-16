<table>
	<thead>
		<tr>
			<th>descripcion</th>
			<th>codigo</th>
			<th>existencia</th>
			<th>unidad</th>
			<th>costo C/u</th>
			<th>costo Total</th>
		</tr>
	</thead>

	<tbody>
		@foreach($inventario as $item)
		<?php
                        $existencia=$item->existencia;
                        $precio=$item->precio;
                        $costo_total=$precio*$existencia; 
                        ?>
		<tr>
			<td>{{$item->descripcion}}</td>
			<td>{{$item->codigo}}</td>
			<td>{{$item->existencia}}</td>
			<td>{{$item->unidad}}</td>
			<td>{{number_format($item->precio, 2,',','.')}}</td>
			<td>{{number_format($costo_total, 2,',','.')}}</td>
		</tr>

		@endforeach
	</tbody>
</table>
