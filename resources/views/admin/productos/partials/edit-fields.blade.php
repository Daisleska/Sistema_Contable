<div class="form-group mb-3">
                    <label for="validationCustom01">Código</label>
                        <input type="text" name="codigo" class="form-control" id="validationCustom01" value="{{ $productos->codigo }}">
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <div class="form-group mb-3">
         <label for="validationCustom02">Nombre</label>
        <input type="text" name="nombre" class="form-control" id="validationCustom02" value="{{ $productos->nombre }}">
         <div class="valid-feedback">
            </div>
                    </div>
                    
     <div class="form-group mb-3">
     <label for="validationCustom02">Descrpción</label>
   <input type="text"  name="descripcion" class="form-control" id="validationCustom02"value="{{ $productos->descripcion }}">
 <div class="valid-feedback">
                           
                        </div>
                    </div>

<div class="form-group mb-3">
 <label for="validationCustom02">Existencia</label>
   <input type="text" class="form-control" id="validationCustom02" name="existencia" value="{{ $productos->existencia}}">
  <div class="valid-feedback">
                       
                        </div>
                    </div>

 <div class="form-group mb-3">
<label for="validationCustom02">Unidad</label>
                       
<select class="form-control" id="validationCustom02" name="unidad" value="{{ $productos->unidad}}">
                       
  <option>Select</option>
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


<div class="form-group mb-3">
<label for="validationCustom02">Precio</label>
<input type="text" class="form-control" id="validationCustom02" name="precio" value="{{ $productos->precio }}">
 <div class="valid-feedback">
                       
                        </div>
                    </div>
<div class="form-group mb-3">
<label for="validationCustom02">Stock Mínimo</label>
<input type="text" class="form-control" id="validationCustom02" name="stock_min" value="{{ $productos->stock_min }}">
<div class="valid-feedback">
                       
                        </div>
                    </div>
    <div class="form-group mb-3">
                        <label for="validationCustom02">Stock Máximo</label>
     <input type="text" class="form-control" id="validationCustom02" name="stock_max" value="{{ $productos->stock_max }}">
                        <div class="valid-feedback">
                       
                        </div>
                    </div>

<input type="submit" class="btn btn-primary" value="Guardar">