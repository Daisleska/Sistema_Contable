<table>
	<thead>
<tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Tipo Usuario</th>
                                                <th>Acción</th>
                                                <th>Fecha y hora</th>
                                               
                                            </tr>
                                            </thead>
                                            <tbody>
                                             @foreach($bitacora as $item)
                                                <tr>
                                                
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $item->user }}</td>
                                                    <td>{{ $item->role }}</td>
                                                    <td>{{ $item->action }}</td>
                                                 
                                                    <td>{{ date('d-M-Y \a\ \l\a\s H:i:s:A' , strtotime($item->created_at)) }}</td>



                                                
                                                    
                                                </tr>
                                               @endforeach
                                            </tbody>                                            
</table>
