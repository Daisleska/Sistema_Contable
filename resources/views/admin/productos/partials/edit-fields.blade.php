<style type="text/css">
.abs-center { 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    background-color: #fff;
}
</style>
<style type="text/css">
.rj { 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    background-color: #fff;
}
</style>
<style type="text/css">
.rs { 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    background-color: #fff;
}
</style>
<style type="text/css">
.JG { 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    background-color: #fff;
}
</style>
<style type="text/css">
.esp { 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    background-color: #fff;
}
</style>
<style type="text/css">
.ver { 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    background-color: #fff;
}
</style>
<style type="text/css">
.barsa { 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    background-color: #fff;
}
</style>
<style type="text/css">
.city { 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    background-color: #fff;
}
</style>
<div class="abs-center">
    <div class="row" style="margin-left: 0.3cm;">
<div class="form-group mb-3">
                    <label style="margin-left: 0.3cm;">&ensp;&ensp;Código*</label>
                         <input style="width: 380px; margin-left: 0.3cm;" type="text" name="codigo" class="form-control" id="validationCustom01" value="{{ $productos->codigo }}">
                        <div class="valid-feedback">

                           
                        </div>
                    </div>
</div>

</div>

<div class="rj">
    <div class="row" style="margin-left: 0.3cm;">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Nombre *</label>
                         <input style="width: 380px; margin-left: 0.3cm;" type="text" name="nombre" class="form-control" id="validationCustom02" value="{{ $productos->nombre }}">
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>


</div>

<div class="rs">
<div class="row" style="margin-left: 0.3cm;">
                    
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Descripción *</label>
                        <input style="width: 380px; margin-left: 0.3cm;" type="text"  name="descripcion" class="form-control" id="validationCustom02"value="{{ $productos->descripcion }}">
                        <div class="valid-feedback">
                           
                        </div>
                    </div>
</div>

</div>

<div class="JG">
<div class="row" style="margin-left: 0.3cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Existencia *</label>
                        <input type="text" style="width: 380px; margin-left: 0.3cm;" class="form-control" id="validationCustom02" name="existencia" value="{{ $productos->existencia}}">
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>
</div>
<div class="esp">
<div class="row" style="margin-left: 0.3cm;">

                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Unidad *</label>
                       
                       <div class="form-group mb-3">
                       
<select style="width: 380px; margin-left: 0.3cm;" class="form-control" id="validationCustom02" name="unidad" value="{{ $productos->unidad}}">
                       
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
                        <div class="valid-feedback">
                       
                        </div>
                    </div>
</div>
</div>
<div class="ver">
<div class="row" style="margin-left: 0.3cm;">
<div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Precio *</label>
                        <input type="text" style="width: 380px; margin-left: 0.3cm;" class="form-control" id="validationCustom02" name="precio" value="{{ $productos->precio }}">
                        <div class="valid-feedback">
                        </div>
                    </div>
</div>
</div>
<div class="city">
    <div class="row" style="margin-left: 0.3cm;">
                    <div class="form-group mb-3">
                        <label style="margin-left: 0.3cm;">&ensp;&ensp;Stock Mínimo *</label>
                           <input style="width: 185px; margin-left: 0.3cm; " type="text" class="form-control" id="validationCustom02" name="stock_min" value="{{ $productos->stock_min }}">
                            <div class="valid-feedback">
                            </div>
                    </div>
   

  
                <div class="form-group mb-3">
                    <label style="margin-left: 0.3cm;">Stock Máximo *</label>    
                        <input style="width: 185px; margin-left: 0.3cm;" type="text" class="form-control" id="validationCustom02" name="stock_max" value="{{ $productos->stock_max }}">
                        </div>
<div class="valid-feedback">
                            </div>
                    </div>
    </div>

</div>
 &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<button style="margin-left: 0.6cm;" class="btn btn-primary" type="submit">Guardar</button>

