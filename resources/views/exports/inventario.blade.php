<table>
	<thead>
		<tr>
			<th>descripcion</th>
			<th>codigo</th>
			<th>existencia</th>
			<th>unidad</th>
			<th>costo</th>
		</tr>
	</thead>

	<tbody>
		@foreach($inventario as $item)

		<tr>
			<td>{{$item->descripcion}}</td>
			<td>{{$item->codigo}}</td>
			<td>{{$item->existencia}}</td>
			<td>{{$item->unidad}}</td>
			<td>{{number_format($item->precio, 2,',','.')}}</td>
		</tr>

		@endforeach
	</tbody>
</table>
