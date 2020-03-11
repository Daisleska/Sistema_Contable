<div class="row form-group">
	<div class="col col-md-2">
		<label>Código</label>
	</div>
	<div class="col col-md-4">
		<input type="text" name="codigo" id="codigo" title="Ingrese el código" value="{{$productos->codigo}}" required="required" class="form-control">
	</div>
</div>


<div class="row form-group">

	<div class="col col-md-2">
		<label>Nombre</label>
	</div>

	<div class="col col-md-10">
		<input type="text" value="{{$productos->nombre}}" name="nombre" id="nombre"  title="Ingrese el nombre" class="form-control">
	</div>
</div>


<div class="row form-group">
<div class="col col-md-2">
		<label>Descripción</label>
	</div>
	<div class="col col-md-4">
		<input type="text" name="descripcion" value="{{$productos->descripcion}}"  id="descripcion"  title="Ingrese la descripción" required="required" class="form-control">
	</div>
</div>

<div class="row form-group">
<div class="col col-md-2">
		<label>Precio</label>
	</div>
	<div class="col col-md-4">
		<input type="text" name="precio" value="{{$productos->precio}}"  id="precio"  title="Ingrese el precio" required="required" class="form-control">
	</div>
</div>

<input type="submit" class="btn btn-primary" value="Guardar">