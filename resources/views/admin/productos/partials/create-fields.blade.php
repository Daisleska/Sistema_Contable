<p style="margin-left: 1cm;">Campos obligatorios (*)</p>
<div class="row" style="margin-left: 1cm;">
<div class="form-group mb-3">
                    <label style="margin-left: 0.3cm;">Código *</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" name="codigo" class="form-control" title="Ingrese el código" value="{{ old('codigo') }}" placeholder="CA08" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 1cm;">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Nombre *</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" name="nombre" class="form-control" title="Ingrese el nombre" value="{{ old('nombre') }}" placeholder="Landing Page" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 1cm;">
                    
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Descripción </label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text"  name="descripcion" class="form-control" title="Ingrese la descripción" value="{{ old('descripcion') }}" placeholder="">
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 1cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Existencia *</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="number" class="form-control" title="Ingrese la existencia" name="existencia" value="{{ old('existencia') }}" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 1cm;" >

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Unidad *</label>
                       
                        <select style="width: 310px; margin-left: 0.3cm;" class="form-control" title="Seleccione la unidad de presentación" name="unidad">
                                    <option>Seleccione</option>
                                    <optgroup label="Seleccione una unidad">
                                        <option value="Caja">Caja</option>
                                        <option value="Bulto">Bulto</option>
                                        <option value="Saco">Saco</option>
                                        <option value="M3">M3</option>
                                        <option value="Resma">Resma</option>
                                        <option value="Paquete">Paquete</option>
                                        <option value="kilo">kilo</option>
                                        <option value="Barril">Barril</option>
                                        <option value="Litros">Litros</option>
                                        <option value="Individual">Individual</option>
                                    </optgroup>
                                </select>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 1cm;" >


                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Precio c/u *</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="number" class="form-control" name="precio" value="{{ old('precio') }}" title="Ingrese el precio" placeholder="200.800,00" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 1cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Stock Mínimo *</label>
                        <input style="width: 150px; margin-left: 0.3cm;" type="number" class="form-control"  name="stock_min" value="{{ old('stock_min') }}" title="Ingrese el stock mínimo" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Stock Máximo *</label>
                        <input style="width: 150px; margin-left: 0.3cm;" type="number" class="form-control" title="Ingrese el stock máximo" name="stock_max" value="{{ old('stock_max') }}" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>
                    <div class="border-top">
                        <div class="card-body" align="right">
                            <button style="align-content: center;" type="reset" class="btn btn-dark">Borrar</button>
                            <button style="align-content: center;" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>



