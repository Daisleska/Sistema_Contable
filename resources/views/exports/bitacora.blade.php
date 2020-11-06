<br><br><br>
<table>
	<thead>
        <tr>
            <th colspan="4" style="text-align: center; color: black;"><strong> BITÁCORA DE ACCIONES</strong></th>
        </tr>
<tr>
     <th style="width: 20px; text-align: center;"><strong>Nombre</strong></th>
     <th style="width: 20px; text-align: center;"><strong>Tipo Usuario</strong></th>
     <th style="width: 34px; text-align: center;"><strong>Acción</strong></th>
     <th style="width: 28px; text-align: center;"><strong>Fecha y hora</strong></th>
                                               
</tr>
</thead>
        <tbody>
        @foreach($bitacora as $item)
        <tr>

        <td style="text-align: center;">{{ $item->user }}</td>
        <td style="text-align: center;">{{ $item->role }}</td>
        <td style="text-align: center;">{{ $item->action }}</td>
        <td style="text-align: center;">{{ date('d-M-Y \a\ \l\a\s H:i:s:A' , strtotime($item->created_at)) }}</td>

        </tr>
     @endforeach
</tbody>                                            
</table>
