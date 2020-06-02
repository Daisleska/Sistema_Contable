<div class="row form-group">

    <div class="col col-md-2">
        <label>Nombre de la Empresa*</label>
    </div>

    <div class="col col-md-8">
        <input type="text" value="{{$empresa->nombre}}" name="nombre" id="nombre"  title="Ingrese el nombre" class="form-control">
    </div>
</div>


<div class="row form-group">
    <div class="col col-md-2">
        <label>RUF*</label>
    </div>
    <div class="col col-md-3">
        <input type="text" name="tipo_documento" id="tipo_documento" title="Ingrese el tipo de documento" value="{{$empresa->tipo_documento}}" required="required" class="form-control">
    </div>

    <div class="col col-md-5">
        <input type="text" name="ruf" id="ruf" title="Ingrese el número de documento" value="{{$empresa->ruf}}" required="required" class="form-control">
    </div>
</div>


<div class="row form-group">

    <div class="col col-md-2">
        <label>Correo*</label>
    </div>

    <div class="col col-md-8">
        <input type="email" value="{{$empresa->email}}" name="email" id="email" title="Ingrese el correo" class="form-control">
    </div>
</div>

<div class="row form-group">
<div class="col col-md-2">
        <label>Dirección*</label>
    </div>
    <div class="col col-md-8">
        <input type="text" name="direccion" value="{{$empresa->direccion}}"  id="direccion"  title="Ingrese la dirección" required="required" class="form-control">
    </div>
</div>

<div class="row form-group">
<div class="col col-md-2">
        <label>Teléfono*</label>
    </div>

    <div class="col col-md-3">
        <input type="text" name="codigo" id="codigo" title="Ingrese el tipo de documento" value="{{$empresa->codigo}}" required="required" class="form-control">
    </div>

    <div class="col col-md-5">
        <input type="text" name="telefono" value="{{$empresa->telefono}}"  id="telefono"  title="Ingrese el número de  teléfono" required="required" class="form-control" maxlength="12">
    </div>
</div>

<div>
    <input type="submit" class="btn btn-primary" value="Guardar">
</div>
