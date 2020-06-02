<p>Campos obligatorios (*)</p>
<div class="row" style="margin-left: 0.3cm;">
<div class="form-group mb-3">
                    <label style="margin-left: 0.3cm;">Código *</label>
                        <input style="width: 380px; margin-left: 0.3cm;" type="text" name="codigo" class="form-control"  value="{{ old('codigo') }}" placeholder="CA08" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.3cm;">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Nombre *</label>
                        <input style="width: 380px; margin-left: 0.3cm;" type="text" name="nombre" class="form-control"  value="{{ old('nombre') }}" placeholder="Landing Page" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.3cm;">
                    
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Descripción </label>
                        <input style="width: 380px; margin-left: 0.3cm;" type="text"  name="descripcion" class="form-control"  value="{{ old('descripcion') }}" placeholder="" required>
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.3cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Existencia *</label>
                        <input style="width: 380px; margin-left: 0.3cm;" type="text" class="form-control"  name="existencia" value="{{ old('existencia') }}" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.3cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Unidad *</label>
                       
                        <select style="width: 380px; margin-left: 0.3cm;" class="form-control"  name="unidad">
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

<div class="row" style="margin-left: 0.3cm;">


                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Precio c/u *</label>
                        <input style="width: 380px; margin-left: 0.3cm;" type="text" class="form-control" name="precio" value="{{ old('precio') }}" placeholder="200.800,00" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.3cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Stock Mínimo *</label>
                        <input style="width: 185px; margin-left: 0.3cm;" type="text" class="form-control"  name="stock_min" value="{{ old('stock_min') }}" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Stock Máximo *</label>
                        <input style="width: 185px; margin-left: 0.3cm;" type="text" class="form-control" name="stock_max" value="{{ old('stock_max') }}" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>
                    <button style="margin-left: 0.6cm;" class="btn btn-primary" type="submit">Guardar</button>



