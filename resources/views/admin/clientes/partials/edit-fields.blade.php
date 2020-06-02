<p>Campos obligatorios (*)</p>

<div class="row form-group">

	<div class="col col-md-2">
		<label>Nombre *</label>
	</div>

	<div class="col col-md-10">
		<input type="text" value="{{$clientes->nombre}}" name="nombre" id="nombre"  title="Ingrese el nombre" class="form-control">
	</div>
</div>


<div class="row form-group">
	<div class="col col-md-2">
		<label>RUF *</label>
	</div>
	<div class="col col-md-4">
		<input type="text" name="tipo_documento" id="tipo_documento" title="Ingrese el tipo de documento" value="{{$clientes->tipo_documento}}" required="required" class="form-control">
	</div>

	<div class="col col-md-4">
		<input type="text" name="ruf" id="ruf" title="Ingrese el número de documento" value="{{$clientes->ruf}}" required="required" class="form-control">
	</div>



<div class="row form-group">

	<div class="col col-md-2">
		<label>Correo *</label>
	</div>

	<div class="col col-md-10">
		<input type="email" value="{{$clientes->email}}" name="email" id="email" title="Ingrese el correo" class="form-control">
	</div>
</div>

<div class="row form-group">
<div class="col col-md-2">
		<label>Dirección *</label>
	</div>
	<div class="col col-md-4">
		<input type="text" name="direccion" value="{{$clientes->direccion}}"  id="direccion"  title="Ingrese la dirección" required="required" class="form-control">
	</div>
</div>

<div class="row form-group">
<div class="col col-md-2">
		<label>Teléfono *</label>
	</div>
	<div class="col col-md-4">
		<input type="text" name="telefono" value="{{$clientes->telefono}}"  id="telefono" maxlength="13"  title="Ingrese el número de  teléfono" required="required" class="form-control">
	</div>
</div>

<input type="submit" class="btn btn-primary" value="Guardar">clientes