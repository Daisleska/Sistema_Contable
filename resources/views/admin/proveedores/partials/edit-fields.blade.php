<div class="row form-group">

	<div class="col col-md-2">
		<label>Nombre de la Empresa</label>
	</div>

	<div class="col col-md-10">
		<input type="text" value="{{$proveedores->representante}}" name="representante" id="representante"  title="Ingrese el representante" class="form-control">
	</div>
</div>



<div class="row form-group">
	<div class="col col-md-2">
		<label>RUF</label>
	</div>
	<div class="col col-md-4">
		<input type="text" name="tipo_documento" id="tipo_documento" title="Ingrese el tipo de documento" value="{{$proveedores->tipo_documento}}" required="required" class="form-control">
	</div>

	<div class="col col-md-4">
		<input type="text" name="ruf" id="ruf" title="Ingrese el número de documento" value="{{$proveedores->ruf}}" required="required" class="form-control">
	</div>
</div>



<div class="row form-group">

	<div class="col col-md-2">
		<label>Nombre</label>
	</div>

	<div class="col col-md-10">
		<input type="text" value="{{$proveedores->nombre}}" name="nombre" id="nombre"  title="Ingrese el nombre" class="form-control">
	</div>
</div>



<div class="row form-group">
<div class="col col-md-2">
		<label>Dirección</label>
	</div>
	<div class="col col-md-4">
		<input type="text" name="direccion" value="{{$proveedores->direccion}}"  id="direccion"  title="Ingrese la dirección" required="required" class="form-control">
	</div>
</div>

<div class="row form-group">

	<div class="col col-md-2">
		<label>Correo</label>
	</div>

	<div class="col col-md-10">
		<input type="email" value="{{$proveedores->correo}}" name="correo" id="correo" title="Ingrese el correo" class="form-control">
	</div>
</div>

<div class="row form-group">
<div class="col col-md-2">
		<label>Teléfono</label>
	</div>
	<div class="col col-md-4">
		<input type="text" name="telefono" value="{{$proveedores->telefono}}"  id="telefono"  title="Ingrese el número de  teléfono" required="required" class="form-control">
	</div>
</div>

<input type="submit" class="btn btn-primary" value="Guardar">