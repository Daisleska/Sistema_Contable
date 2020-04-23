<table>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Correo electronico</th>
		</tr>
	</thead>

	<tbody>
		@foreach($users as $user)

		<tr>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
		</tr>

		@endforeach
	</tbody>
</table>