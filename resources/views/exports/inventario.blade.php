<br><br><br>
@foreach($empresa as $key)
<table>
    <thead>
    <tr>
        <th><strong>NOMBRE DE LA EMPRESA:</strong> </th>
        <td colspan="2"><strong>{{$key->nombre}}</strong></td>
    </tr>
    <tr>
  
        <th><strong> MES:</strong></th>
        <td colspan="2"><strong>{{$mes}} {{$anio}}</strong></td>
    </tr>
    <tr>
 
        <th><strong> RUT:</strong></th>
        <td colspan="2"><strong>{{$key->tipo_documento}}-{{$key->ruf}}</strong></td>
    </tr>
</thead>


@endforeach
</table> 
@foreach($inventario as $item)
		<?php
        $existencia=$item->existencia;
        $precio=$item->precio;
        $costo_total=$precio*$existencia;

        $valor_total[]=$costo_total;

		$total=array_sum($valor_total);
	 
                        ?>
@endforeach

<table>
	<thead>
		<tr>
			<th colspan="6" style="text-align: center; color: black;"><strong> LIBRO DE INVENTARIO</strong></th>
		</tr>
		<tr>
			<th colspan="5" style="text-align: right; color: black;"><strong>Valor Total:</strong></th>
			<th style="text-align: center; color: black;"><strong>{{number_format($total, 2,',','.')}} </strong></th>
		</tr>
		<tr>
			<th style="width: 27px; text-align: center;"><strong>Descripción</strong></th>
			<th style="width: 15px; text-align: center;"><strong>Código</strong></th>
			<th style="width: 15px; text-align: center;"><strong>Existencia</strong></th>
			<th style="width: 25px; text-align: center;"><strong>Unidad</strong></th>
			<th style="width: 25px; text-align: center;"><strong>Costo C/U</strong></th>
			<th style="width: 27px; text-align: center;"><strong>Costo Total</strong></th>
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
			<td style="text-align: center;">{{$item->descripcion}}</td>
			<td style="text-align: center;">{{$item->codigo}}</td>
			<td style="text-align: center;">{{$item->existencia}}</td>
			<td style="text-align: center;">{{$item->unidad}}</td>
			<td style="text-align: center;">{{number_format($item->precio, 2,',','.')}}</td>
			<td style="text-align: center;">{{number_format($costo_total, 2,',','.')}}</td>
		</tr>

		

		@endforeach
	</tbody>
</table>
