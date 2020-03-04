<div class="row form-group">
	<div class="col col-md-2">
		<label>Código</label>
	</div>
	<div class="col col-md-4">
		<input type="text" name="codigo" id="codigo" placeholder="h1h1h1" title="Ingrese el codigo del repuesto" value="{{$repuesto->codigo}}" required="required" class="form-control">
	</div>

	<div class="col col-md-2">
		<label>Descripción</label>
	</div>
	<div class="col col-md-4">
		<input type="text" name="descripcion" value="{{$repuesto->descripcion}}"  id="descripcion" placeholder="perez.." title="Ingrese el nombre del repuesto" required="required" class="form-control">
	</div>
</div>


<div class="row form-group">

	<div class="col col-md-2">
		<label>Cantidad</label>
	</div>

	<div class="col col-md-10">
		<input type="number" value="{{$repuesto->cantidad}}" name="cantidad" id="cantidad" placeholder="100" title="Ingrese la cantidad" class="form-control">
	</div>
</div>

<input type="submit" class="btn btn-primary" value="Guardar">