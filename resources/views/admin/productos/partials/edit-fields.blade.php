<p style="margin-left: 0.1cm;">Campos obligatorios (*)</p>
<div class="row" style="margin-left: 0.1cm;">
<div class="form-group mb-3">
                    <label style="margin-left: 0.3cm;">Código *</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" name="codigo" class="form-control"  value="{{ $productos->codigo }}" placeholder="CA08" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.1cm;">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Nombre *</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text" name="nombre" class="form-control"  value="{{ $productos->nombre }}" placeholder="Landing Page" required>
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.1cm;">
                    
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Descripción </label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="text"  name="descripcion" class="form-control" value="{{ $productos->descripcion }}" placeholder="" required>
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.1cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Existencia *</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="number" class="form-control"  name="existencia" value="{{ $productos->existencia}}" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.1cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Unidad *</label>
                       
                        <select style="width: 310px; margin-left: 0.3cm;" class="form-control"  name="unidad">
                                    <optgroup label="Seleccione una unidad">
                                        <option value="Caja" @if($productos->unity=="Caja") selected="selected" @endif >Caja</option>
                                        <option value="Bulto" @if($productos->unity=="Bulto") selected="selected" @endif >Bulto</option>
                                        <option value="Saco" @if($productos->unity=="Saco") selected="selected" @endif >Saco</option>
                                        <option value="M3" @if($productos->unity=="M3") selected="selected" @endif >M3</option>
                                        <option value="Resma" @if($productos->unity=="Resma") selected="selected" @endif >Resma</option>
                                        <option value="Paquete" @if($productos->unity=="Paquete") selected="selected" @endif >Paquete</option>
                                        <option value="kilo" @if($productos->unity=="kilo") selected="selected" @endif >kilo</option>
                                        <option value="Barril" @if($productos->unity=="Barril") selected="selected" @endif >Barril</option>
                                        <option value="Litros" @if($productos->unity=="Litros") selected="selected" @endif >Litros</option>
                                        <option value="Individual" @if($productos->unity=="Individual") selected="selected" @endif >Individual</option>
                                    </optgroup>
                                </select>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.1cm;">


                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">Precio c/u *</label>
                        <input style="width: 310px; margin-left: 0.3cm;" type="number" class="form-control" name="precio" value="{{ $productos->precio }}" placeholder="200.800,00" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>

<div class="row" style="margin-left: 0.1cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Stock Mínimo *</label>
                        <input style="width: 150px; margin-left: 0.3cm;" type="number" class="form-control"  name="stock_min" value="{{ $productos->stock_min }}" placeholder="" required>
                        <div class="valid-feedback">
                       
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Stock Máximo *</label>
                        <input style="width: 150px; margin-left: 0.3cm;" type="number" class="form-control" name="stock_max" value="{{ $productos->stock_max }}" placeholder="" required>
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




























